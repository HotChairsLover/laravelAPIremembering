<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
           $roles = ['Уборщик', 'Менеджер', 'Охранник', 'Разработчик', 'Еще кто-то'];
           foreach($roles as $role){
               $data = [
                   'name' => $role
               ];
               DB::table('roles')->insert($data);
           }
        });
    }
}
