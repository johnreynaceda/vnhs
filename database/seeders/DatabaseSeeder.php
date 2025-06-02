<?php

namespace Database\Seeders;

use App\Models\GradeLevel;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('password'),
            'user_type' => 'admin',
        ]);
        User::create([
            'name' => 'Teacher 1',
            'email' => 'teacher1@gmail.com',
            'username' => 'teacher1',
            'password' => bcrypt('password'),
            'user_type' => 'teacher',
        ]);

        GradeLevel::create([
            'name' => 'Grade 11',
        ]);
        GradeLevel::create([
            'name' => 'Grade 12',
        ]);
    }
}
