<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getCommentsByPost($id)
    {
        $post = Post::find($id);
        $comments = "";
        if($post != null){
            $comments = Post::find($id)->comments;
        }
        return view('comments', compact('comments', 'post'));
    }
}