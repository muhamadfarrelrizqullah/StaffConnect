<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'phone' => '123456789',
            'address' => '123 Main St, Anytown',
            'birthdate' => '1990-01-01',
            'departement_id' => 1,
            'position_id' => 1,
        ]);

        Employee::create([
            'name' => 'Jane Smith',
            'email' => 'jane.smith@example.com',
            'phone' => '987654321',
            'address' => '456 Elm St, Othertown',
            'birthdate' => '1985-05-15',
            'departement_id' => 2,
            'position_id' => 2,
        ]);

        Employee::create([
            'name' => 'Victoria Smith',
            'email' => 'vic.smith@example.com',
            'phone' => '987654321',
            'address' => '456 Elm St, Othertown',
            'birthdate' => '1985-05-15',
            'departement_id' => 3,
            'position_id' => 3,
        ]);
    }
}
