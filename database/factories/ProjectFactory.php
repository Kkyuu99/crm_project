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
        return [
            'project_name'=> fake()->name(),
            'organization_name'=> fake()->name(),
            'project_type'=> fake()->name(),
            'project_manager'=> fake()->name(),
            'issue_id'=>Issue::factory(),  
            'users_id' => User::inRandomOrder()->first()->id ?? null,          
            'contact_name'=>fake()->name(),            
            'contact_phone'=>fake()->phoneNumber(),            
            'contact_email'=>fake()->email(),            
            'created_by'=>fake()->name(),
            'updated_by'=>fake()->name(),
            'deleted_by'=>fake()->name()
        ];
    }
}
