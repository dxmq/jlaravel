<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use function Sodium\compare;

class IndexController extends Controller
{
    public function index()
    {
        $per_page = config('jlaravel.posts_per_page');
        $posts = Post::where('status', '<>', -1)->orderBy('created_at', 'desc')->with('user')->withCount([
            'comments',
            'zans',
        ])->paginate($per_page);

        return view('index.index', compact('posts'));
    }

    public function search(Post $post)
    {
        $query = \request('query');
        if (empty($query)) {
            return redirect('/');
        }

        $posts = $post->where('title', 'like',
            "%{$query}%")->with('user')->paginate(config('jlaravel.search_per_page'));

        return view('index.search', compact('query', 'posts'));
    }
}
