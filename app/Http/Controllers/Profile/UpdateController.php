<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProfileRequest;

class UpdateController extends Controller
{
    public function __invoke(UpdateProfileRequest $request)
    {
        $user = Auth::user();
        $data = $request->validated();
        $user->update($data);
        return view('profile.index', compact('user'));
    }
}
