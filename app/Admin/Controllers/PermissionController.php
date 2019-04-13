<?php

namespace App\Admin\Controllers;

use App\Http\Requests\PermissionCreate;
use App\Http\Requests\PermissionUpdate;
use App\Models\Permission;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::get();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(PermissionCreate $request)
    {
        Permission::create($request->postFillData());
        return redirect('admin/permissions')->with('success', '添加成功');
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(PermissionUpdate $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->name = $request->get('name');
        $permission->description = $request->get('description');
        $permission->save();

        return redirect('admin/permissions')->with('success', '修改成功');
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return back()->with('success', '删除成功');
    }
}
