<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }

    public function show(Post $post, $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function edit(Post $post)
    {
//        $post = Post::findOrFail($id);
        if (Gate::denies('update', $post)) {
            abort(403);
        }
        return view('posts.edit', compact('post'));
    }
}
