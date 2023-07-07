<?php

namespace App\Http\Controllers;
use App\Http\Controllers\PostController;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|',
            'comment' => 'required',
            'post_id' => 'required|exists:posts,id',
        ]);


        Comment::create([

            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'comment' => $request->input('comment'),
            'post_id' => $request->input('post_id'),
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->back()->with('success', 'Comment submitted successfully.');



     }

}
