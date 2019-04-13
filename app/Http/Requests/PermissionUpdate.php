<?php

namespace App\Http\Requests;

class PermissionUpdate extends PermissionCreate
{
    public function rules()
    {
        $id = $this->route()->parameter('permission');
        return [
            'name' => 'required|max:30|unique:admin_permissions,name,' . $id,
            'description' => 'required|max:50'
        ];
    }
}
