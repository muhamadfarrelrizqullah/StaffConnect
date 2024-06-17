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
        Departement::create(['name' => 'IT Department', 'description' => 'Responsible for managing IT infrastructure']);
        Departement::create(['name' => 'HR Department', 'description' => 'Responsible for managing human resources']);
        Departement::create(['name' => 'Finance Department', 'description' => 'Responsible for financial management']);
    }
}
