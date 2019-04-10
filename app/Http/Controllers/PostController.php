<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreate;
use App\Http\Requests\PostUpdate;
use App\Models\Post;

class PostController extends Controller
{

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostCreate $post)
    {
        Post::create($post->only('title', 'content'));

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }


    public function update(PostUpdate $post_up, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $post_up->get('title');
        $post->content = $post_up->get('content');
        $post->save();

        return redirect('/');
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/');
    }


    public function image()
    {

    }
}
