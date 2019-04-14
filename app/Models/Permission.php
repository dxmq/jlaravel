<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'admin_permissions';
    protected $fillable = ['name', 'description'];

    // 当前权限下的角色
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'admin_role_permissions', 'permission_id', 'role_id')->withPivot('role_id', 'permission_id');
    }
}
