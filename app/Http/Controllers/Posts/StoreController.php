<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StorePostRequest $request)
    {
        $post = $request->validated();
        $post['image'] = Storage::disk('public')->put('images', $post['image']);
        $post = Post::create($post + ['author_id' => Auth::user()->id]);
        return redirect()->route('posts.show', $post->id);
    }
}
