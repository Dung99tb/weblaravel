<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('list', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('view', $post);
        return view('show', compact('post'));
    }
}
