<?php

namespace App\Http\Controllers;

use App\Models\Company;

class StoreCompanyAction
{

    public function __invoke(array $payload): Company
    {
        $company = new Company($payload);
        $company->save();

        return $company;
    }
}
