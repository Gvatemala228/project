<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;

class StoreController extends BaseController
{
    public function __invoke(StorePostRequest $request)
    {
        $post = $request->validated();
        $id = $this->service->store($post);
        return redirect()->route('posts.show', $id);
    }
}
