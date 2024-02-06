<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(IndividualRecordSeeder::class);
        $this->call(HistoryOfIndividualRecordSeeder::class);
    }
}
