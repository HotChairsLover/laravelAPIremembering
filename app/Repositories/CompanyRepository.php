<?php

namespace App\Repositories;

use App\Models\Company as Model;

class CompanyRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }
}
