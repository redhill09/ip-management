<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'role' => 'super-admin',
        ]);
        User::factory()->create([
            'name' => 'Regular User',
            'username' => 'regular',
            'password' => bcrypt('regular'),
            'role' => 'regular',
        ]);
    }
}
