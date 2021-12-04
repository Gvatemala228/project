<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class UserPostsController extends Controller
{
    public function __invoke($id)
    {
        if (Auth::check() && Auth::user()->id == $id) {
            $user = Auth::user();
            $posts = $user->posts;
            return view('profile.posts', compact('posts'));
        }
        $user = User::find($id);
        $posts = $user->posts;
        return view('profile.userPosts', compact('posts', 'id'));
    }
}
