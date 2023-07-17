<?php

namespace Progresivjose\LaravelPianoOauth\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController
{
    public function logout(Request $request)
    {
        if (Auth::user()) {
            Auth::logout();

            $request->session()->regenerate();

            return redirect()->intended('/');
        }
    }
}
