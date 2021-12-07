<?php

namespace App\Services\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function store($post)
    {
        $post['image'] = Storage::disk('public')->put('images', $post['image']);
        $post = Post::create($post + ['author_id' => Auth::user()->id]);
    }
    public function update()
    {
    }
}
