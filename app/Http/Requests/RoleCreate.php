<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleCreate extends FormRequest
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
            'name' => 'required|max:30|unique:admin_roles,name',
            'description' => 'required|max:50'
        ];
    }

    public function attributes()
    {
        return [
            'name' => '角色',
            'description' => '描述',
        ];
    }

    public function postFillData()
    {
        return $this->only('name', 'description');
    }
}
