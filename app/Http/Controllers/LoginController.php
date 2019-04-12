<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectTo = '/';

    public function index()
    {
        if(Auth::check()) {
            return redirect($this->redirectTo);
        }

        return view('login.index');
    }

    public function login(Login $login)
    {
        $user = $login->only('email', 'password');
        $remember = intval($login->get('is_remember'));
        if (Auth::attempt($user, $remember)) {
            return redirect($this->redirectTo);
        }

        return back()->withErrors('用户名或密码错误');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
