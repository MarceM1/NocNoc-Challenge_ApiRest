<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $content = fake()->paragraph();
        $users = User::all();
        $randomUserId = $users->random()->id;
        $task = Task::all();
        $randomTaskId = $task->random()->id;
        
        return [
            'content' => $content,
            'task_id' => $randomTaskId,
            'user_id' => $randomUserId,


        ];
    }
}
