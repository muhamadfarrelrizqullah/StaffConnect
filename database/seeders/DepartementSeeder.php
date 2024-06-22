<?php

namespace Database\Seeders;

use App\Models\Departement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Array Seeder Departement
        $departements = [
            ['name' => 'IT', 'description' => 'Responsible for managing IT infrastructure'],
            ['name' => 'HR', 'description' => 'Responsible for managing human resources'],
            ['name' => 'Finance', 'description' => 'Responsible for financial management'],
            ['name' => 'Marketing', 'description' => 'Responsible for marketing activities'],
            ['name' => 'Sales', 'description' => 'Responsible for sales operations'],
            ['name' => 'Customer Support', 'description' => 'Responsible for customer support services'],
        ];

        // Foreach Each data
        foreach ($departements as $dept) {
            Departement::create($dept);
        }
    }
}
