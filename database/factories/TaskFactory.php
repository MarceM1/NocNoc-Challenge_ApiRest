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
        $title = fake()->sentence();
        $description = fake()->paragraph();
        $status = fake()->randomElement(['pendiente', 'en_proceso', 'bloqueado', 'completado']);
        $dueDate = fake()->dateTimeBetween('+1 week', '+1 month');

        $users = User::all();
        $randomUserId = $users->random()->id;
        $admin = User::where('role', 'admin')->get();
        $randomAdmin = $admin->random()->id;

        return [
            'title' => $title,
            'description' => $description,
            'status' => $status,
            'due_date' => $dueDate,
            'assigned_user_id' => $randomUserId, //Usuario aleatorio
            'user_id' => $randomAdmin //Admin aleatorio
        ];
    }
}
