<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::latest()->paginate(6);
        $posts->withPath('posts');
        return view('posts.index', compact('posts'));
    }
}
