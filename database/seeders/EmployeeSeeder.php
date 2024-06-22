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
        // Array Seeder employee
        $employees = [
            ['name' => 'John Doe', 'email' => 'john@gmail.com', 'phone' => '123456789', 'address' => '123 Main St, Anytown', 'birthdate' => '1990-01-01', 'departement_id' => 1, 'position_id' => 1],
            ['name' => 'Jane Smith', 'email' => 'jane@gmail.com', 'phone' => '987654321', 'address' => '456 Elm St, Othertown', 'birthdate' => '1985-05-15', 'departement_id' => 2, 'position_id' => 2],
            ['name' => 'Victoria Kimberly', 'email' => 'victoria@gmail.com', 'phone' => '987654321', 'address' => '456 Elm St, Othertown', 'birthdate' => '1985-05-15', 'departement_id' => 3, 'position_id' => 3],
            ['name' => 'Alice Johnson', 'email' => 'alice@gmail.com', 'phone' => '111222333', 'address' => '789 Pine St, Newtown', 'birthdate' => '1992-03-12', 'departement_id' => 1, 'position_id' => 4],
            ['name' => 'Bob Brown', 'email' => 'bob@gmail.com', 'phone' => '222333444', 'address' => '101 Maple St, Oldtown', 'birthdate' => '1988-07-24', 'departement_id' => 2, 'position_id' => 5],
            ['name' => 'Carol White', 'email' => 'carol@gmail.com', 'phone' => '333444555', 'address' => '202 Oak St, Smalltown', 'birthdate' => '1995-11-30', 'departement_id' => 3, 'position_id' => 6],
            ['name' => 'Dave Green', 'email' => 'dave@gmail.com', 'phone' => '444555666', 'address' => '303 Birch St, Bigtown', 'birthdate' => '1980-04-22', 'departement_id' => 1, 'position_id' => 7],
            ['name' => 'Eve Black', 'email' => 'eve@gmail.com', 'phone' => '555666777', 'address' => '404 Cedar St, Metropolis', 'birthdate' => '1993-09-10', 'departement_id' => 2, 'position_id' => 8],
            ['name' => 'Frank Wilson', 'email' => 'frank@gmail.com', 'phone' => '666777888', 'address' => '505 Walnut St, Capital City', 'birthdate' => '1987-02-18', 'departement_id' => 3, 'position_id' => 9],
            ['name' => 'Grace Davis', 'email' => 'grace@gmail.com', 'phone' => '777888999', 'address' => '606 Cherry St, Villagetown', 'birthdate' => '1991-06-05', 'departement_id' => 1, 'position_id' => 10],
        ];

        // Foreach Each data
        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
