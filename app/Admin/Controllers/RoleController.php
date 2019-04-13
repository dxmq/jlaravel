<?php

namespace App\Admin\Controllers;

use App\Http\Requests\RoleCreate;
use App\Http\Requests\RoleUpdate;
use App\Http\Requests\UserUpdate;
use App\Models\AdminUser;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(RoleCreate $request)
    {
        Role::create($request->postFillData());
        return redirect('admin/roles')->with('success', '增加成功');
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    public function update(RoleUpdate $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->name = $request->get('name');
        $role->description = $request->get('description');
        $role->save();

        return redirect('admin/roles')->with('success', '修改成功');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect('admin/roles')->with('success', '删除成功');
    }
}
