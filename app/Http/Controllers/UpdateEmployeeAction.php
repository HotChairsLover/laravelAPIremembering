<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class UpdateEmployeeAction
{
    public function __invoke($payload, Employee $employee): Employee
    {
        $employee->update($payload);

        return $employee;
    }
}
