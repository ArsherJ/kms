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
        // DEFAULT ROLES
        DB::table('roles')->insert([
            'title' => 'Admin',
            'created_at' => '2023-10-14 16:33:33',
            'updated_at' => '2023-10-14 16:33:33'
        ]);

        // DEFAULT ROLES
        DB::table('roles')->insert([
            'title' => 'User',
            'created_at' => '2023-10-14 16:33:33',
            'updated_at' => '2023-10-14 16:33:33'
        ]);

    }
}
