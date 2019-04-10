<?php

namespace App\Http\Requests;

class PostUpdate extends PostCreate
{
    public function rules()
    {
        $id = $this->route()->parameter('post');
        return [
            'title' => 'required|max:50|unique:posts,title,'.$id,
            'content' => 'required'
        ];
    }
}
