<?php

namespace Database\Seeders;

use App\Repositories\CompanyRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $company_repository = new CompanyRepository();
        $companies_ids = $company_repository->getAllIds();
        DB::transaction(function () use($companies_ids) {
            for ($count = 0; $count < 30; $count++)
            {
                $data = [
                  'name' => fake()->company,
                  'address' => fake()->streetAddress(),
                  'director' => fake()->firstNameMale(),
                  'company_id' => fake()->randomElement($companies_ids)->id
                ];
                DB::table('departments')->insert($data);
            }
        });
    }
}
