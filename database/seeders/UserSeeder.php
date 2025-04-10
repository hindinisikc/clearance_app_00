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
    public function run()
{
    $supervisors = [
        ['Robert', 'Johnson'],
        ['Alex', 'Smith'],
        ['David', 'Garcia']
    ];

    // Create proper supervisors
    foreach ($supervisors as $supervisor) {
        User::create([
            'name' => "{$supervisor[0]} {$supervisor[1]}",
            'email' => strtolower($supervisor[0][0]).strtolower($supervisor[1]).'@example.com',
            'password' => Hash::make('password123'),
            'is_supervisor' => true
        ]);
    }

    // Create employees
    $employees = [
        ['Mary', 'Williams'],
        ['Michael', 'Brown'],
        ['Sarah', 'Jones'],
        ['Jessica', 'Davis'],
        ['Daniel', 'Miller'],
        ['Laura', 'Wilson'],
        ['Emily', 'Moore'],
        ['Chris', 'Taylor'],
        ['James', 'Anderson'],
        ['Patricia', 'Thomas']
    ];

    foreach ($employees as $employee) {
        User::create([
            'name' => "{$employee[0]} {$employee[1]}",
            'email' => strtolower($employee[0][0]).strtolower($employee[1]).'@example.com',
            'password' => Hash::make('password123'),
            'is_supervisor' => false
        ]);
    }
}
}
