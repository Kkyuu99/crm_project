<?php

namespace Database\Factories;

use App\Models\Project;
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
        // return [
        //     'name' => fake()->name(),
        //     'email' => fake()->unique()->safeEmail(),
        //     'password' => static::$password ??= Hash::make('password'),
        //     'role' => 'user',
        //     'created_by' => fake()->name(), 
        //     'updated_by' => fake()->name(),
        //     'deleted_by' => fake()->name(),
        // ];
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'role' => fake()->randomElement(['admin', 'user']),
            'created_by' => fake()->name(), 
            'updated_by' => fake()->name(),
            'deleted_by' => fake()->name(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ];
    }
}

