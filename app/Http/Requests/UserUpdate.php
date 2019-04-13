<?php

namespace App\Http\Requests;


class UserUpdate extends UserCreate
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    // 更新相关
    public function returnNoPassword()
    {
        $id = $this->route()->parameter('user');
        return [
            'name' => 'required|min:2|max:50|unique:admin_users,name,' . $id,
        ];
    }

    public function returnAll()
    {
        $id = $this->route()->parameter('user');
        return [
            'name' => 'required|min:2|max:50|unique:admin_users,name,' . $id,
            'password' => 'required|min:6|max:30'
        ];
    }
}
