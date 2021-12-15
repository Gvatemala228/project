<?php

namespace App\Http\Controllers\Posts\Comments;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Controllers\Controller;

class DestroyController extends Controller
{
    public function __invoke($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back();
    }
}
