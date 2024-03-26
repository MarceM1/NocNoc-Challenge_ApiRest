<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::all();
        $randomUserId = $users->random()->id;
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'status' => fake()->randomElement(['pendiente', 'en_proceso', 'bloqueado', 'completado']),
            'due_date' => fake()->dateTimeBetween('+1 week', '+1 month'), // Set due date within a range
            'assigned_user_id' => null, // Can be set manually later
            'created_by_id' => $randomUserId
        ];
    }
}
