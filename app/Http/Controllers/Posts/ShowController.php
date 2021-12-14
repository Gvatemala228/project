<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke($id)
    {
        if ($post = Post::find($id)) {
            return view('posts.show', compact('post'));
        } else {
            return abort(404);
        }
    }
}
