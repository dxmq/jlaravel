<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreate;
use App\Http\Requests\PostUpdate;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function show($id)
    {
        $post = Post::with('user')->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostCreate $post)
    {
        Post::create($post->postFillData());

        return redirect('/');
    }

    public function edit(Post $post)
    {
        $this->authorize('update', Post::class);
        return view('posts.edit', compact('post'));
    }


    public function update(PostUpdate $post_up, $id)
    {
        $this->authorize('update', Post::class);

        $post = Post::findOrFail($id);
        $post->fill($post_up->postFillData());
        $post->save();

        return redirect('/');
    }

    public function delete($id)
    {
        $this->authorize('delete', Post::class);

        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/');
    }


    public function image()
    {

    }
}
