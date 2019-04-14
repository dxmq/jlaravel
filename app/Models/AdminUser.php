<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUser extends Authenticatable
{
    protected $table = 'admin_users';
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // 当前用户的角色(多对多)
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'admin_role_users', 'user_id', 'role_id')->withPivot('user_id',
            'role_id');
    }

    // 删除role和user的关联
    public function deleteRole($role)
    {
        $this->roles()->detach($role);
    }

    // 是否有某个角色
    public function isInRoles($role)
    {
        return ! ! $role->intersect($this->roles)->count();
    }

    // 是否有权限
    public function hasPermission($permission)
    {
        return $this->isInRoles($permission->roles);
    }
}