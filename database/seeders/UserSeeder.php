<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Supervisors
        for ($i = 1; $i <= 3; $i++) {
            User::create([
                'name' => "Supervisor $i",
                'email' => "supervisor$i@example.com",
                'password' => Hash::make('password'),
                'is_supervisor' => true, // optional column if using
            ]);
        }

        // Employees
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => "Employee $i",
                'email' => "employee$i@example.com",
                'password' => Hash::make('password'),
                'is_supervisor' => false,
            ]);
        }

    }
}
