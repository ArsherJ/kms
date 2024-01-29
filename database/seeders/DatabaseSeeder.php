<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

        // \App\Models\User::factory(10)->create();
        // \App\Models\IndividualRecord::factory(150)->create();
        // \App\Models\FeedingProgram::factory(20)->create();
        // \App\Models\User::factory(20)->create();
        // \App\Models\Announcement::factory(20)->create();
        // \App\Models\Faq::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
