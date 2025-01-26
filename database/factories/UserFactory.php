<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The default password for the user.
     *
     * @var string
     */
    protected static $password;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'role' => 'user',
            'project_id' => fake()->numberBetween(1, 20),
            'created_by' => fake()->name(), 
            'updated_by' => fake()->name(),
            'deleted_by' => fake()->name(),
            'password' => static::$password ??= Hash::make('password'),
        ];
    }
}

