<?php

namespace App\Http\Controllers\Posts;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdatePostRequest;

class UpdateController extends BaseController
{
    public function __invoke(Post $post, UpdatePostRequest $request)
    {
        $data = $request->validated();
        $this->service->update($post, $data);
        return redirect()->route('posts.show', $post->id);
    }
}
