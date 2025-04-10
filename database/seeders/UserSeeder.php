<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    /*
    This is a PHP Seeder for the User model. It fills the database with initial user data.

    What This Code Does
    Creates a list of users (like "John Doe", "Jane Smith")
    Fills the database with these users
    Assigns roles to users (like "admin", "employee")
    */

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
