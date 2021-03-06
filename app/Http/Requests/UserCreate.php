<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreate extends FormRequest
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
            'name' => 'required|min:2|max:50|unique:admin_users,name',
            'password' => 'required|min:6|max:30'
        ];
    }

    public function attributes()
    {
        return [
            'name' => '用户名',
            'password' => '密码',
        ];
    }

    public function postFillData()
    {
        return [
            'name' => $this->get('name'),
            'password' => bcrypt($this->get('password')),
        ];
    }
}
