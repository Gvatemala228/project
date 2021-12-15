<?php

namespace App\Http\Controllers\Posts\Comments;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCommentRequest;

class StoreController extends Controller
{
    public function __invoke(StoreCommentRequest $request)
    {
        $comment = $request->validated();
        Comment::create($comment);
        return redirect()->back();
    }
}
