<?php

namespace App\Http\Requests;

class RoleUpdate extends RoleCreate
{
    public function rules()
    {
        $id = $this->route()->parameter('role');
        return [
            'name' => 'required|max:30|unique:admin_roles,name,' . $id,
            'description' => 'required|max:50'
        ];
    }
}
