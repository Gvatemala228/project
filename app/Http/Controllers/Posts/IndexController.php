<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::all()->reverse();
        return view('posts.index', compact('posts'));
    }
}
