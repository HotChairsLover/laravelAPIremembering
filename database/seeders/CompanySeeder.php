<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            for ($count = 0; $count < 10; $count++)
            {
                $data = [
                    'name' => fake()->company
                ];
                DB::table('companies')->insert($data);
            }
        });

    }
}
