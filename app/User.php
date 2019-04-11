<?php

namespace App;

use App\Models\Fan;
use App\Models\Post;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // 我的粉丝
    public function fans()
    {
        return $this->hasMany(Fan::class, 'star_id', 'id');
    }

    public function hasFan($user_id)
    {
        return $this->fans()->where('fan_id', $user_id)->count();
    }

    // 我关注(粉)的人
    public function stars()
    {
        return $this->hasMany(Fan::class, 'fan_id', 'id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }
}
