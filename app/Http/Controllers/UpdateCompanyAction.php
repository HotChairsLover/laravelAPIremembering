<?php

namespace App\Http\Controllers;

use App\Models\Company;

class UpdateCompanyAction
{

    public function __invoke(array $payload, Company $company)
    {
        $company->update($payload);

        return $company;
    }
}
