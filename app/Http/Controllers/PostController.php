<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\CommentController;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(12);
    return view('welcome', compact('posts'));
    }



    public function create()
    {
        return view('company/create');
    }



    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image' => $imageName,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }





 /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function show($id)
     {
         $post = Post::with('comments')->find($id);

         $suggestedComments = [
            "Great post!",
            "I found this very helpful.",
            "Thank you for sharing.",
        ];

         return view('postpadg', [
            'post' => $post,
        'suggestedComments' => $suggestedComments,
         ]);
     }

    // Pass the post to the view

}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

