<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTopic extends Model
{
    protected $table = 'post_topics';
    protected $guarded = [];

    public function scopeInTopic($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }
}
