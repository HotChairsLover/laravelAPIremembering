<?php

namespace App\Repositories;

use App\Models\Role as Model;
class RoleRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }

}
