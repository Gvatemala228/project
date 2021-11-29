<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __invoke()
    {
        $posts = Auth::user()->posts;
        return view('profile.posts', compact('posts'));
    }
}
