<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Issue>
 */
class IssueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // return [
        //     'project_id'=>Project::factory(),
        //     'subject'=>fake()->word(),
        //     'description'=>fake()->sentence(),
        //     'priority'=>fake()->word(),
        //     'assignor_user'=>fake()->word(),
        //     'attachment'=>fake()->word(),
        //     'remark'=>fake()->paragraph()
        // ];
        return [
<<<<<<< HEAD
            'project_id' => fake()->numberBetween(1, 10),
            'issue_status' => fake()->randomElement(['open', 'closed', 'in_progress']),
            'subject' => fake()->name(),
            'description' => fake()->text(),
            'priority' => fake()->randomElement(['low', 'medium', 'high']),
            'attachment' => fake()->fileExtension(),
            'assignor_user' => fake()->name(),
            'remark' => fake()->text(),
            'total_duration' => fake()->numberBetween(1, 100),
=======
            'project_id' => Project::inRandomOrder()->first()->id ?? Project::factory(),
            'issue_status' => fake()->randomElement(['Open', 'Closed', 'In progress', 'Resolved']),
            'subject' => fake()->name(),
            'description' => fake()->text(),
            'priority' => fake()->randomElement(['Low', 'Medium', 'High', 'Urgent']),
            'attachment' => fake()->fileExtension(),
            'assignor_user' => User::inRandomOrder()->first()->id ?? User::factory(),
            'remark' => fake()->text(),
            'solution' => fake()->text(),
            'total_duration' => fake()->numberBetween(1, 100),
            'due_date' => $this->faker->dateTimeBetween('now', '+30 days')->format('Y-m-d'),
>>>>>>> fe5005435fda480a6b596025c207e299b8517f26
        ];
    }
}
