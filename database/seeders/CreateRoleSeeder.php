<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'User', 'description' => 'Can handle limited Access in the system' ,'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'Mini-Admin', 'description' => 'Has access to those who are defined by the admin' ,'guard_name' => 'web', 'created_at' => now()],
        ]);
    }
}
