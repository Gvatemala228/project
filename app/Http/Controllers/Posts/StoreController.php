<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke()
    {
        $post = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required'
        ]);

        Post::create($post + ['author_id' => Auth::user()->id]);
        return redirect()->route('home'); //Сделать переадресацию на пост
    }
}
