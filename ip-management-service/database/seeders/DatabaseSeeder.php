<?php

namespace Database\Seeders;

use App\Models\AuditLog;
use App\Models\IpAddress;
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
        //Users
        User::factory()->admin()->create();
        User::factory()->regular()->create();

        //IpAddress
        $admin = User::where('role', 'super-admin')->first();
        $user = User::where('role', 'regular')->first();

        IpAddress::factory()->count(5)->create(['user_id' => $admin->id]);
        IpAddress::factory()->count(5)->create(['user_id' => $user->id]);

        //AuditLog
        AuditLog::factory()->count(10)->create();
    }
}
