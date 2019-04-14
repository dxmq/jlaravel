<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'admin_roles';

    protected $fillable = ['name', 'description'];

    // 当前角色的所有权限
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'admin_role_permissions', 'role_id',
            'permission_id')->withPivot('permission_id', 'role_id');
    }

    // 给角色授权
    public function grantPermission($permission)
    {
        return $this->permissions()->save($permission); // 保存到admin_role_permissions表
    }

    /*
     * 删除role和permission的关联
     */
    public function deletePermission($permission)
    {
        return $this->permissions()->detach($permission);
    }

    // 判断角色是否有当前权限
    public function hasPermission($permission)
    {
        return $this->permissions->contains($permission);
    }
}
