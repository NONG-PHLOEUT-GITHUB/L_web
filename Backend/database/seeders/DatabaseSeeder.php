<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Course;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Course::factory()->count(10)->create();
        Category::factory()->count(10)->create();
        User::factory()->create([
            'username' => 'Admin',
            'email' => 'admin@example.com',
        ]);
    }
}