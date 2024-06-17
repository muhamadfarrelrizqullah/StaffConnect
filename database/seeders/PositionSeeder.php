<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Position::create(['title' => 'Software Engineer', 'level' => 'Senior', 'description' => 'Develop software applications']);
        Position::create(['title' => 'HR Manager', 'level' => 'Manager', 'description' => 'Manage human resources department']);
        Position::create(['title' => 'Accountant', 'level' => 'Junior', 'description' => 'Handle financial transactions']);
    }
}
