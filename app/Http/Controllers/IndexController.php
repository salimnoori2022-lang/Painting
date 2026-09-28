<?php

namespace App\Http\Controllers;

use App\Models\Post;

class IndexController extends Controller
{
    public function index()
    {
        $post = Post::withCount('comments')->with('likes')->latest('id')->paginate(6);

        return view('index', compact('post'));
    }
}
