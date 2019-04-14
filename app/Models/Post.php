<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    public function topics()
    {
        return $this->belongsToMany(Topic::class, 'post_topics', 'post_id', 'topic_id')->withPivot('topic_id',
            'post_id');
    }

    public function postTopics()
    {
        return $this->hasMany(PostTopic::class, 'post_id');
    }

    public function scopeTopicNotBy(Builder $query, $topic_id)
    {
        return $query->doesntHave('postTopics', 'and', function ($q) use ($topic_id) {
            $q->where("topic_id", $topic_id);
        });
    }

    public function scopeAuthorBy($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }
}
