<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('posts.create');
    }
}
