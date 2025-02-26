<?php

namespace Database\Seeders;

use App\Repositories\DepartmentRepository;
use App\Repositories\RoleRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_repository = new RoleRepository();
        $department_repository = new DepartmentRepository();
        $role_ids = $role_repository->getAllIds();
        $department_ids = $department_repository->getAllIds();
        DB::transaction(function () use ($role_ids, $department_ids) {
            for ($count = 0; $count < 300; $count++)
            {
                $data = [
                    'firstname' => fake()->firstName(),
                    'lastname' => fake()->lastName(),
                    'role_id' => fake()->randomElement($role_ids)->id,
                    'department_id' => fake()->randomElement($department_ids)->id
                ];
                DB::table('employees')->insert($data);
            }
        });
    }
}
