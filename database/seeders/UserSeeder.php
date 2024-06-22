<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Array Seeder User
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'status' => 'Active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'admin2@gmail.com',
                'password' => Hash::make('admin'),
                'status' => 'Inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alice Johnson',
                'email' => 'admin3@gmail.com',
                'password' => Hash::make('admin'),
                'status' => 'Active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Foreach Each data
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
