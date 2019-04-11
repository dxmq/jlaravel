<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'user_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }

    public function zans()
    {
        return $this->hasMany(Zan::class)->orderBy('created_at', 'desc');
    }

    public function zan($user_id) // 判断一个用户是否点赞过
    {
        return $this->hasOne(Zan::class)->where('user_id', $user_id);
    }
}
