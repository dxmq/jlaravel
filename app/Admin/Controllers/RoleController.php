<?php

namespace App\Admin\Controllers;

use App\Http\Requests\RoleCreate;
use App\Http\Requests\RoleUpdate;
use App\Models\Permission;
use App\Models\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
        $permissionStr = '';
        foreach ($roles as $role) {
            foreach ($role->permissions as $permission) {
                $permissionStr .= $permission->description . ',';
            }
        }

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

    public function permission(Role $role)
    {
        $permissions = Permission::all(); // 所有的权限
        $rolePermissions = $role->permissions; // 当前角色的权限
        return view('admin.roles.permission', compact('role','permissions', 'rolePermissions'));
    }

    public function assignPermission(Role $role)
    {
        $this->validate(request(), [
            'permissions' => 'required|array'
        ]);

        $permissions = Permission::find(request('permissions'));
        $myPermissions = $role->permissions; // 当前角色拥有的权限

        // 对已经存在的权限
        $addPermissions = $permissions->diff($myPermissions);
        foreach ($addPermissions as $permission) {
            $role->grantPermission($permission);
        }

        $deletePermission = $myPermissions->diff($permissions);
        foreach ($deletePermission as $permission) {
            $role->deletePermission($permission);
        }

        return redirect('admin/roles')->with('success', '分配权限成功');
    }
}
