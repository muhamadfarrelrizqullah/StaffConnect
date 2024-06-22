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
        // Array Seeder Position
        $positions = [
            ['title' => 'Software Engineer', 'level' => 'Senior', 'description' => 'Develop software applications'],
            ['title' => 'HR Manager', 'level' => 'Manager', 'description' => 'Manage human resources department'],
            ['title' => 'Accountant', 'level' => 'Junior', 'description' => 'Handle financial transactions'],
            ['title' => 'Marketing Manager', 'level' => 'Manager', 'description' => 'Execute marketing campaigns'],
            ['title' => 'Sales', 'level' => 'Junior', 'description' => 'Sell products and services'],
            ['title' => 'Customer Support', 'level' => 'Junior', 'description' => 'Provide customer support'],
            ['title' => 'R&D', 'level' => 'Senior', 'description' => 'Conduct research and development'],
            ['title' => 'Legal Advisor', 'level' => 'Senior', 'description' => 'Provide legal advice'],
            ['title' => 'Quality Assurance', 'level' => 'Senior', 'description' => 'Test product quality'],
            ['title' => 'Operations Manager', 'level' => 'Manager', 'description' => 'Coordinate daily operations']
        ];

        // Foreach Each data
        foreach ($positions as $position) {
            Position::create($position);
        }
    }
}
