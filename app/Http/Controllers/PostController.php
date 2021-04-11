<?php

namespace App\Http\Controllers;

use App\Alice\Constants\JsonIndexes;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

class PostController extends Controller
{
    private $rules;

    public function __construct()
    {
        $this->rules = [
            'content' => 'required|min:3',
            'image_file' => 'max:5000'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Retrieve all posts.
     * 
     * @return Json
     */
    public function all()
    {
        $posts = Post::whereNull('deleted_at')
            ->with(['user', 'likes', 'posts'])
            ->orderBy('created_at', 'DESC')
            ->get();
        return response()->json($posts);
    }

    /**
     * Like a post.
     * 
     * @param Request $request
     * @return Json
     */
    public function switchLike(Request $request)
    {
        $likeData = Like::where('post_id', $request->get('post_id'))
            ->where('user_id', auth()->user()->id)
            ->first();

        if ($likeData == null) { // Set LIKE = TRUE
            $like = new Like();
            $like->post_id = $request->get('post_id');
            $like->user_id = auth()->user()->id;
            $like->save();

            return response()->json([JsonIndexes::SUCCESS => true]);
        } else { // Set LIKE = FALSE
            $likeData->delete();

            return response()->json([JsonIndexes::SUCCESS => false]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            return response()->json([
                JsonIndexes::INVALID_INPUT_MESSAGE => $validator->messages()
            ], Response::HTTP_BAD_REQUEST);
        }

        $file = $request->file('image_file');
        $imageNewName = time() . '.' . $file->getClientOriginalExtension();
        $file->move('images', $imageNewName);

        $post = new Post();
        $post->content = $request->get('content');
        $post->image_url = $imageNewName;
        $post->user_id = auth()->id();

        if ($post->save()) {
            return response()->json([JsonIndexes::SUCCESS => true]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
