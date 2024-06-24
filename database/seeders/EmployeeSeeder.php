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
            ['name' => 'Dev Khoirul', 'email' => 'dev@gmail.com', 'phone' => '123456789', 'address' => 'Ngoro', 'birthdate' => '1990-01-01', 'departement_id' => 1, 'position_id' => 1],
            ['name' => 'Anindya Hapsari', 'email' => 'anindya@gmail.com', 'phone' => '987654321', 'address' => 'Sidoarjo', 'birthdate' => '1985-05-15', 'departement_id' => 2, 'position_id' => 2],
            ['name' => 'Asta Yuda', 'email' => 'asta@gmail.com', 'phone' => '987654321', 'address' => 'Lumajang', 'birthdate' => '1985-05-15', 'departement_id' => 3, 'position_id' => 3],
            ['name' => 'Bob Rozikin', 'email' => 'bob@gmail.com', 'phone' => '111222333', 'address' => 'Pasuruan', 'birthdate' => '1992-03-12', 'departement_id' => 1, 'position_id' => 4],
            ['name' => 'Helmi Fajar', 'email' => 'helmi@gmail.com', 'phone' => '222333444', 'address' => 'Pandaan', 'birthdate' => '1988-07-24', 'departement_id' => 2, 'position_id' => 5],
            ['name' => 'Carol Anwar', 'email' => 'carol@gmail.com', 'phone' => '333444555', 'address' => 'Sidoarjo', 'birthdate' => '1995-11-30', 'departement_id' => 3, 'position_id' => 6],
            ['name' => 'Nur Wijaya', 'email' => 'nur@gmail.com', 'phone' => '444555666', 'address' => 'Surabaya', 'birthdate' => '1980-04-22', 'departement_id' => 1, 'position_id' => 7],
            ['name' => 'Erfan Sodikin', 'email' => 'erfan@gmail.com', 'phone' => '555666777', 'address' => 'Mojokerto', 'birthdate' => '1993-09-10', 'departement_id' => 2, 'position_id' => 8],
            ['name' => 'Wilson Renata', 'email' => 'wilson@gmail.com', 'phone' => '666777888', 'address' => 'Malang', 'birthdate' => '1987-02-18', 'departement_id' => 3, 'position_id' => 9],
            ['name' => 'Grace Okta', 'email' => 'grace@gmail.com', 'phone' => '777888999', 'address' => 'Malang', 'birthdate' => '1991-06-05', 'departement_id' => 1, 'position_id' => 10],
        ];

        // Foreach Each data
        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
