<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class PostsCategoryController extends Controller
{
    public function __invoke($id)
    {
        $category = Category::find($id);
        $posts = $category->posts->reverse();
        $category = $category->title;
        return view('posts.category', compact('posts', 'category'));
    }
}
