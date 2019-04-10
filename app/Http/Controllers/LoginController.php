<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function login(Login $login)
    {
        $user = $login->only('email', 'password');
        $remember = intval($login->get('is_remember'));
        if (Auth::attempt($user, $remember)) {
            return redirect('/');
        }

        return back()->withErrors('用户名或密码错误');
    }
}
