<?php

namespace App\Http\Middleware;

use Exception;
use App\Alice\Constants\JsonIndexes;
use JWTAuth;
use App\Alice\Constants\Messages;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (TokenBlacklistedException $e) {
            return response()->json([JsonIndexes::ERROR_MESSAGE => Messages::TOKEN_BLACKLISTED], Response::HTTP_BAD_REQUEST);
        } catch (TokenInvalidException $e) {
            return response()->json([JsonIndexes::ERROR_MESSAGE => Messages::TOKEN_INVALID], Response::HTTP_BAD_REQUEST);
        } catch (TokenExpiredException $e) {
            return response()->json([JsonIndexes::ERROR_MESSAGE => Messages::TOKEN_EXPIRED], Response::HTTP_BAD_REQUEST);
        } catch (JWTException $e) {
            return response()->json([JsonIndexes::ERROR_MESSAGE => Messages::TOKEN_REQUIRED], Response::HTTP_BAD_REQUEST);
        }

        return $next($request);
    }
}
