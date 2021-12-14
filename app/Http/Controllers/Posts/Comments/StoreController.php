<?php

namespace App\Http\Controllers\Posts\Comments;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function __invoke($id, Request $request)
    {
        $request->merge(['author_id' => Auth::user()->id, 'post_id' => $id]);
        $comment = $request->validate([
            'author_id' => '',
            'post_id' => '',
            'comment' => 'required',
        ]);
        Comment::create($comment);
        return redirect()->back();
    }
}
