<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index(){
        $posts = Post::get();
        $res = $posts->map(function($post){
            // sending internal http request to the comments service
            $post->comments = \Http::get("http://localhost:8001/api/posts/{$post->id}/comments")->json();
            return $post;
        });

        return $res;
    }
    function store(Request $request){
        return Post::create([
            'title' => $request->title,
            'description' => $request->description
        ]);
    }
}
