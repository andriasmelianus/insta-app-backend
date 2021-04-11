<?php

namespace App\Http\Controllers;

use App\Alice\Constants\JsonIndexes;
use App\Alice\Constants\Messages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Validator;

class AuthController extends Controller
{
    private $rules;
    private $loginRules;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->rules = [
            'name' => 'required|min:3|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:5|max:32'
        ];

        $this->loginRules = [
            'email' => 'required|email',
            'password' => 'required|min:5|max:32'
        ];
    }

    /**
     * Register new user.
     * 
     * @param Request $request
     * @return void
     */
    public function register(Request $request)
    {
        // $this->validate($request, $this->rules);
        $validator = Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            return response()->json([
                JsonIndexes::INVALID_INPUT_MESSAGE => $validator->messages()
            ], Response::HTTP_BAD_REQUEST);
        }

        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        if ($user->save()) {
            return response()->json([
                JsonIndexes::SUCCESS => Messages::REGISTRATION_SUCCESS
            ]);
        }
    }

    /**
     * Get a JWT via given credentials.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), $this->loginRules);
        if ($validator->fails()) {
            return response()->json([
                JsonIndexes::INVALID_INPUT_MESSAGE => $validator->messages()
            ], Response::HTTP_BAD_REQUEST);
        }

        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
