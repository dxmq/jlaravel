<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Fan extends Model
{
    protected $guarded = [];

    public function fuser() // 粉丝用户
    {
        return $this->hasOne(User::class, 'id', 'fan_id');
    }

    public function suser() // 关注用户
    {
        return $this->hasOne(User::class, 'id', 'star_id');
    }
}
