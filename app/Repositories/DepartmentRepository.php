<?php

namespace App\Repositories;

use App\Models\Department as Model;

class DepartmentRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }

}
