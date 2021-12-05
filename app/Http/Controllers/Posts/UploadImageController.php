<?php

namespace App\Http\Controllers\Posts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UploadImageController extends Controller
{
    public function __invoke(Request $request)
    {
        $path = Storage::disk('public')->put('images', $request->file('file'));
        return response()->json(['location' => "/storage/$path"]);
    }
}
