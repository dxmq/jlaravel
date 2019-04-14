<?php

namespace App\Http\Controllers;

use App\Http\Requests\Register;
use App\User;

class RegisterController extends Controller
{
    protected $redirectTo = '/login';

    public function index()
    {
        return view('register.index');
    }

    public function register(Register $register)
    {
        $data = [
            'name' => $register->get('name'),
            'email' => $register->get('email'),
            'password' => bcrypt($register->get('password')),
        ];

        User::create($data);

        return redirect($this->redirectTo)->with('success', '注册成功！');
    }
}
