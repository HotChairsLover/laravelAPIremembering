<?php

namespace App\Http\Controllers;

use App\Models\Role;

class UpdateRoleAction
{
    public function __invoke($payload, Role $role)
    {
        $role->update($payload);

        return $role;
    }
}
