<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostTopic;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    public function index(Topic $topic)
    {
        $posts = $topic->posts()->orderBy('created_at',
            'desc')->with(['user'])->take(config('jlaravel.topic_posts_per_page'))->get(); // 该专题下所有文章

        $myposts = Post::authorBy(Auth::id())->topicNotBy($topic->id)->where('status', '<>',
            -1)->get(); // 这个用户写的并且没有被专题收录的并且没有被禁止的

        return view('topics.index', compact('topic', 'posts', 'myposts'));
    }

    // 投稿
    public function submit(Topic $topic)
    {
        $this->validate(request(), [
            'post_ids' => 'array',
        ]);

        $post_ids = request('post_ids');
        // 判断这些文章是否是当前用户的
        $posts = Post::find($post_ids);
        foreach ($posts as $post) {
            if ($post->user_id != Auth::id()) {
                return back()->withErrors('没有权限');
            }
        }
        $topic_id = $topic->id;

        foreach ($post_ids as $post_id) {
            PostTopic::firstOrCreate(compact('topic_id', 'post_id'));
        }

        return back()->with('success', '投稿成功');
    }
}
