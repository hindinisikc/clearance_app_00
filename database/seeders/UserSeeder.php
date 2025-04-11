<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create supervisors only if they don't already exist
        $supervisors = [
            ['Robert', 'Johnson'],
            ['Alex', 'Smith'],
            ['David', 'Garcia']
        ];

        foreach ($supervisors as $supervisor) {
            User::firstOrCreate(
                ['email' => strtolower($supervisor[0][0]).strtolower($supervisor[1]).'@example.com'],
                [
                    'name' => "{$supervisor[0]} {$supervisor[1]}",
                    'password' => Hash::make('password123'),
                    'is_supervisor' => true
                ]
            );
        }

        // Create employees only if they don't already exist
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
            User::firstOrCreate(
                ['email' => strtolower($employee[0][0]).strtolower($employee[1]).'@example.com'],
                [
                    'name' => "{$employee[0]} {$employee[1]}",
                    'password' => Hash::make('password123'),
                    'is_supervisor' => false
                ]
            );
        }
    }
}
