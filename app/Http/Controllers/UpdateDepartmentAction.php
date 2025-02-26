<?php

namespace App\Http\Controllers;

use App\Models\Department;

class UpdateDepartmentAction
{
    public function __invoke($payload, Department $department): Department
    {
        $department->update($payload);

        return $department;
    }
}
