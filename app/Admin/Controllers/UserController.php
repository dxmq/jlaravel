<?php

namespace App\Admin\Controllers;

use App\Http\Requests\UserCreate;
use App\Http\Requests\UserUpdate;
use App\Models\AdminUser;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = AdminUser::with('roles')->paginate(config('jlaravel.admin_users_per_page'));
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

    public function edit(AdminUser $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, UserUpdate $userUpdate, $id)
    {
        $user = AdminUser::findOrFail($id);
        if (empty($request->get('password'))) {
            $validator = $request->validate($userUpdate->returnNoPassword());
            $user->name = $validator['name'];
            $user->save();
            return redirect('admin/users')->with('success', '修改成功');
        }
        $validator = $request->validate($userUpdate->returnAll());
        $user->name = $validator['name'];
        $user->password = $validator['password'];
        $user->save();

        return redirect('admin/users')->with('success', '修改成功');
    }

    public function delete($id)
    {
        $user = AdminUser::findOrFail($id);
        $user->delete();
        return back()->with('success', '删除成功');
    }

    public function role(AdminUser $user)
    {
        $roles = Role::all(); // 所有的角色
        $myRoles = $user->roles;
        return view('admin.users.role', compact('user', 'roles', 'myRoles'));
    }

    public function assignRole(AdminUser $user)
    {
        $this->validate(request(), [
            'roles' => 'required|array'
        ]);

        $roles = Role::find(request('roles'));
        $myRoles = $user->roles;

        // 对已经有的角色
        $addRoles = $roles->diff($myRoles);
        foreach ($addRoles as $role) {
            $user->roles()->save($role);
        }

        $deleteRoles = $myRoles->diff($roles);
        foreach ($deleteRoles as $role) {
            $user->deleteRole($role);
        }

        return redirect('admin/users')->with('success', '角色分配成功');
    }
}
