<?php

namespace Progresivjose\LaravelPianoOauth\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Progresivjose\LaravelPianoOauth\Repositories\PianoUserRepository;
use Progresivjose\PianoOauth\PianoOauth;

class LoginController
{
    public function __construct(private PianoOauth $pianoOauth, private PianoUserRepository $repository)
    {

    }
    public function showLoginForm()
    {
        $this->pianoOauth->preAuth(route('post-login'), config('piano.redirect_url'));
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'code' => 'required|string'
        ]);

        $user = $this->pianoOauth->postAuth($request->get('code'), route('post-login'));

        if (!$user) {
            return redirect()->route('login.failed', 401);
        }

        $data = [
            'uid' => $user->getUID(),
            'first_name' => $user->getFirstName(),
            'last_name' => $user->getLastName(),
            'personal_name' => $user->getPersonalName(),
            'email' => $user->getEmail(),
        ];

        if($pianoUser = $this->repository->createIfNotExists($data)) {
            Auth::guard(config('piano.guard'))->login($pianoUser, true);

            $request->session()->regenerate();

            return redirect()->intended();
        }
    }

    public function failed()
    {
        return view('laravel-piano-oauth::auth.login-failed');
    }
}
