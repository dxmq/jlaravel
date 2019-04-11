<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Fan extends Model
{
    public function fuser()
    {
        return $this->hasOne(User::class, 'id', 'fan_id');
    }

    public function suser()
    {
        return $this->hasOne(User::class, 'id', 'star_id');
    }
}
