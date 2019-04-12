<?php

namespace App\Admin\Controllers;

use App\Http\Requests\UserCreate;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = AdminUser::paginate(config('jlaravel.admin_users_per_page'));
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserCreate $request)
    {
        AdminUser::create($request->postFillData());
        return redirect('admin/users')->with('success', '增加成功');
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
