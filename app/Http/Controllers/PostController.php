<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index(User $user = null)
    {
        $posts = Post::when($user, function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->whereNotNull("image")->whereNotNull("published_at")->orderByDesc("promoted")->orderByDesc("published_at")->paginate(12);

        $authors = User::whereHas('posts', function ($query) {
            $query->whereNotNull('published_at');
        })->get();

        return view('posts.index', compact('posts', "authors"));
    }

    public function show(Post $post)
    {

        if (!$post->published_at) {
            abort(404);
        }
        $post->load(['comments' => function ($query) {
            $query->orderByDesc('created_at');
        }]);
        return view('posts.show', compact('post'));
    }

    public function promoted()
    {
        $promotedPosts = Post::where('promoted', true)
                             ->whereNotNull('published_at') 
                             ->orderByDesc('published_at') 
                             ->paginate(12); 

        return view('posts.promoted', compact('promotedPosts'));
    }
}
