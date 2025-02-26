<?php

namespace App\Http\Controllers;

use App\Models\Department;

class StoreDepartmentAction
{
    public function __invoke($payload): Department
    {
        $department = new Department($payload);
        $department->save();

        return $department;
    }
}
