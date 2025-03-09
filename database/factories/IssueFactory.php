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

        $project = Project::inRandomOrder()->first() ?? Project::factory()->create();
        $user = User::inRandomOrder()->first() ?? User::factory()->create();
        return [
            'project_id' => $project->id,
            'issue_status' => fake()->randomElement(['Open', 'Closed', 'In progress', 'Resolved']),
            'subject' => fake()->name(),
            'description' => fake()->text(),
            'priority' => fake()->randomElement(['Low', 'Medium', 'High', 'Urgent']),
            'attachment' => fake()->fileExtension(),
            'assignor_user' => $user->id,
            'remark' => fake()->text(),
            'solution' => fake()->text(),
            'total_duration' => fake()->numberBetween(1, 100),
            'due_date' => $this->faker->dateTimeBetween('now', '+30 days')->format('Y-m-d'),

            'created_by' => $user->id, 
            'updated_by' => $user->id,
            'deleted_by' => $user->id,
        ];
    }
}
