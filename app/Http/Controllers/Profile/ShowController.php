<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke($id)
    {
        if (Auth::check()) {
            if (Auth::user()->id == $id) {
                $user = User::find($id);
                return view('profile.index', compact('user'));
            }
        }

        if ($user = User::find($id)) {
            return view('profile.show', compact('user'));
        } else {
            return "Пользователя $id не существует!";
        }
    }
}
