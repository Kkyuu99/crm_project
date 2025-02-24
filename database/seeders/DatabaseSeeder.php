<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Issue;
use App\Models\Project;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
<<<<<<< HEAD
        User::factory(50)->create();
        Project::factory(50)->create();
        Issue::factory(100)->create();
=======
        $projects = Project::factory(10)->create();
>>>>>>> fe5005435fda480a6b596025c207e299b8517f26

        User::factory(10)->create()->each(function ($user) use ($projects) {
            $user->projects()->attach($projects->random(rand(1, 3))->pluck('id'));
        });

        Issue::factory(100)->create();

        // Create an admin user
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);
    
        $admin->projects()->attach($projects->random(2)->pluck('id'));
    }

}
