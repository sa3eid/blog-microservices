<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function index($id){
        return Comment::where('post_id',$id)->get();
    }
    function store(Request $request){
        return Comment::create([
            'post_id' => $request->post_id,
            'text' => $request->text
        ]);
    }
}
