<?php

namespace App\Http\Controllers\Posts\Comments;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DestroyController extends Controller
{
    public function __invoke($id)
    {
        $comment = Comment::find($id);
        if (Auth::user()->id != $comment->author_id) {
            return abort(403);
        }
        $comment->delete();
        return response()->json(['response' => 'Успешное удаление комментария']);
    }
}
