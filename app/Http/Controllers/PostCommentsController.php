<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PostCommentsController extends Controller
{
    // public function store(Post $post)
    // {
    //     request()->validate([
    //         'body' => 'required'
    //     ]);

    //     $post->comments()->create([
    //         'user_id' => request()->user()->id,
    //         'body' => request('body')
    //     ]);

    //     return back();
    // }

    public function store(Request $request, Post $post)
    {
        // Validate the input fields
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        // Create the comment and associate it with the post
        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->name = $validated['name'];
        $comment->body = $validated['body'];
        $comment->save();

        // Redirect back to the post page with the new comment
        return redirect()->route('post', $post); // Adjust the route name as necessary
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
