<?php

namespace Database\Factories;

use App\Models\Project;
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
            'project_id' => fake()->numberBetween(1, 10),
            'issue_status' => fake()->randomElement(['open', 'closed', 'in_progress']),
            'subject' => fake()->name(),
            'description' => fake()->text(),
            'priority' => fake()->randomElement(['low', 'medium', 'high']),
            'attachment' => fake()->fileExtension(),
            'assignor_user' => fake()->name(),
            'remark' => fake()->text(),
            'total_duration' => fake()->numberBetween(1, 100),
        ];
    }
}
