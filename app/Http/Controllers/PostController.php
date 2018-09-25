<?php

namespace App\Http\Controllers;

use App\Events\PostCreate;
use App\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request, post $post)
    {
        $allPosts = $post->whereIn('user_id', $request->user()->following()->pluck('users.id')
                ->push($request->user()->id))->with('user');
        $posts = $allPosts->orderBy('created_at','desc')->take(10)->get();
        return response()->json([
            'posts' => $posts,
        ]);
    }
    public function create(Request $request, post $post)
    {
        // created post
        $createedPost = $request->user()->post()->create([
            'body' => $request->body,
        ]);

        // broadcost message

        broadcast(new PostCreate($createedPost, $request->user))->toOthers();
        // return the response
        return response()->json($post->with('user')->find($createedPost->id));
    }
}
