<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class IndexController extends Controller
{
    public function index()
    {
        $per_page = config('jlaravel.posts_per_page');
        $posts = Post::orderBy('created_at', 'desc')->with('user')->paginate($per_page);

        return view('index.index', compact('posts'));
    }

}
