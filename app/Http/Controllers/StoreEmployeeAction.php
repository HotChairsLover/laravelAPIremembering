<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class StoreEmployeeAction
{
    public function __invoke($payload): Employee
    {
        $employee = new Employee($payload);
        $employee->save();

        return $employee;
    }

}
