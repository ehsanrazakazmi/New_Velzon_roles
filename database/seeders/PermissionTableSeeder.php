<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['name' => 'role-list','guard_name' => 'web', 'created_at' => now()],
            ['name' => 'role-create','guard_name' => 'web', 'created_at' => now()],
            ['name' => 'role-edit','guard_name' => 'web', 'created_at' => now()],
            ['name' => 'role-delete','guard_name' => 'web','created_at' => now()],
            ['name' => 'product-list','guard_name' => 'web','created_at' => now()],
            ['name' => 'product-create','guard_name' => 'web','created_at' => now()],
            ['name' => 'product-edit','guard_name' => 'web','created_at' => now()],                
            ['name' => 'product-delete','guard_name' => 'web','created_at' => now()],
        ]);
    }
}
