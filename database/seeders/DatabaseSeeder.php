<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            // PostSeeder::class,
            // TagSeeder::class,
            // NewsSeeder::class,
            // TaskSeeder::class,
            // StepSeeder::class,
            // ContactSeeder::class,
        ]);
    }
}
