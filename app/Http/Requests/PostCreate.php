<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PostCreate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50|unique:posts,title',
            'content' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'title' => '标题',
            'content' => '内容',
        ];
    }

    // 返回表单数据
    public function postFillData()
    {
        return [
            'title' => $this->get('title'),
            'content' => $this->get('content'),
            'user_id' => Auth::id(),
        ];
    }
}
