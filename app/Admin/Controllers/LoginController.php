<?php

namespace App\Admin\Controllers;

use App\Http\Requests\AdminLogin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectTo = 'admin/index';

    public function index()
    {
        return view('admin.login.index');
    }

    public function login(AdminLogin $request)
    {
        $user = $request->only(['name', 'password']);
        if (true == Auth::guard('admin')->attempt($user)) {
            return redirect($this->redirectTo);
        }
        return back()->withErrors('用户名或密码错误');
    }
}
