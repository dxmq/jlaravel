<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CommentCreate extends FormRequest
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
            'post_id' => 'required|integer',
            'content' => 'required|max:200'
        ];
    }

    public function attributes()
    {
        return [
            'content' => '内容',
        ];
    }

    public function postFillData()
    {
        return [
            'user_id' => Auth::id(),
            'post_id' => $this->get('post_id'),
            'content' => $this->get('content'),
        ];
    }
}
