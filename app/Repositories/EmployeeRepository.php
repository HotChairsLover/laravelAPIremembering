<?php

namespace App\Repositories;

use App\Models\Employee as Model;
class EmployeeRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }

}
