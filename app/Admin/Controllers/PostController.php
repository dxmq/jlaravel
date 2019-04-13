<?php

namespace App\Admin\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 0)->orderBy('created_at', 'desc')->paginate(config('jlaravel.admin_posts_per_page'));
        return view('admin.posts.index', compact('posts'));
    }

    public function status(Post $post)
    {
        $this->validate(request(), [
            'status' => 'required|in:-1,1'
        ]);
        $post->status = \request('status');
        $post->save();

        return [
            'error' => 0,
            'msg' => ''
        ];
    }
}
