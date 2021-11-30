<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }
}
