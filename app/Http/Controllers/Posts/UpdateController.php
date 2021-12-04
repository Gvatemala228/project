<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(Post $post)
    {
        $data = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image'
        ]);
        if (isset($data['image'])) {
            $data['image'] = Storage::disk('public')->put('images', $data['image']);
        } else {
            $data['image'] = $post['image'];
        }
        $post->update($data);
        return redirect()->route('posts.show', $post->id);
    }
}
