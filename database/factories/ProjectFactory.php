<?php

namespace Database\Factories;

use App\Models\Issue;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // return [
        //     'project_name'=> fake()->jobTitle(),
        //     'organization_name'=> fake()->company(),
        //     'project_type'=> fake()->name(),
        //     'project_manager'=> fake()->name(),
        //     'issue_id'=>Issue::factory(),  
        //     'user_id' => User::inRandomOrder()->limit(1)->value('id') ?? null,          
        //     'contact_name'=>fake()->name(),            
        //     'contact_phone'=>fake()->phoneNumber(),            
        //     'contact_email'=>fake()->email(),            
        //     'created_by'=>fake()->name(),
        //     'updated_by'=>fake()->name(),
        //     'deleted_by'=>fake()->name()
        // ];

        return [
            'project_name' => fake()->name(),
            'organization_name' => fake()->company(),
            'project_type' => fake()->randomElement(['Strategic', 'Operational','Operative','Analytical']),
            'project_manager' => fake()->name(),
            //'issue_id' => Issue::factory(),
            'contact_name' => fake()->name(),
            'contact_phone' => fake()->phoneNumber(),
            'contact_email' => fake()->email(),
            'status' => fake()->randomElement(['Active', 'Inactive']),

            'created_by' => User::inRandomOrder()->first()->id ?? User::factory(), 
            'updated_by' => User::inRandomOrder()->first()->id ?? User::factory(),
            'deleted_by' => User::inRandomOrder()->first()->id ?? User::factory(),
        ];
    }
}
