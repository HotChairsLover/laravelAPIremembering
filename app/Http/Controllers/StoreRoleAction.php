<?php

namespace App\Http\Controllers;

use App\Models\Role;

class StoreRoleAction
{
    public function __invoke($payload): Role
    {
        $role = new Role($payload);
        $role->save();

        return $role;
    }
}
