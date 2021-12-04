<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CreateController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }
}
