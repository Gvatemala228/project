<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Post;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = $request->input('query');
        if (!$query) {
            return redirect()->back();
        }
        $postsByTitle = Post::where('title', 'LIKE', "%{$query}%")->orderBy('title')->get();
        $postsByContent = Post::where('content', 'LIKE', "%{$query}%")->orderBy('title')->get();
        return view('posts.search', compact('query', 'postsByTitle', 'postsByContent'));
    }
}
