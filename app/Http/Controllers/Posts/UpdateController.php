<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController
{
    public function __invoke(Post $post)
    {
        $data = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image'
        ]);
        $this->service->update($post, $data);
        return redirect()->route('posts.show', $post->id);
    }
}
