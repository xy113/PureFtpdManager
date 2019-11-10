<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function showLoginForm()
    {
        return view('pureftp.login');
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    public function attemptLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $usernameLogin = $this->guard()->attempt([
            'username'=>$username,
            'password'=>$password
        ], $request->has('remember'));

        if ($usernameLogin) {
            return true;
        }

        $emailLogin = $this->guard()->attempt([
            'email'=>$username,
            'password'=>$password
        ], $request->has('remember'));

        if ($emailLogin) {
            return true;
        }

        return false;
    }

    public function username()
    {
        return 'username';
    }
}
