<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\IpAddress;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AuditLog>
 */
class AuditLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ipData = IpAddress::factory()->create();
        $action = $this->faker->randomElement(['Created IP', 'Updated IP', 'Deleted IP']);
        $details = $action === 'Updated IP'
            ? "IP changed from '{$ipData->ip}' to '{$this->faker->ipv4()}'"
            : $action . " " . $ipData->ip;

        return [
            'user_id' => User::factory(),
            'action' => $action,
            'details' => $details,
        ];
    }
}
