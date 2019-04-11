<?php

namespace App\Policies;

use App\Models\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * 用户更新文章授权
     * @param User|null $user
     * @param Post $post
     * @return bool
     */
    public function update(?User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }


    public function delete(?User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
}
