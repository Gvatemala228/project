<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function __invoke($id)
    {
        $user = User::find($id);
        request()->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);
        if (!Hash::check(request()->old_password, $user->password)) {
            return back()->with('error', 'Неправильный старый пароль');
        }

        $user->update([
            'password' => Hash::make(request()->password)
        ]);

        return redirect()->route('profile.edit')->with('message', 'Пароль успешно изменён!');
    }
}
