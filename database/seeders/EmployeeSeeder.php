<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Arr;



class EmployeeSeeder extends Seeder
{

    /*
    This is a PHP Seeder for the Employee model. It fills the database with initial employee data. Let me explain it in simple terms.
    What This Code Does
    Creates a list of employees (like "John Doe", "Jane Smith")
    Fills the database with these employees
    Assigns each employee to a supervisor (like "Manager A", "Manager B")
    */

    /**
     * Run the database seeds.
     */
    private $firstNames = [
        'John',
        'Jane',
        'Michael',
        'Sarah',
        'David',
        'Emily',
        'Chris',
        'Jessica',
        'Daniel',
        'Laura',
    ];


    private $lastNames = [
        'Smith',
        'Johnson',
        'Williams',
        'Jones',
        'Brown',
        'Davis',
        'Miller',
        'Wilson',
        'Moore',
        'Taylor',
    ];



    public function run(): void
    {
        $firstNames = ['James', 'Mary', 'Robert', 'Patricia', 'John', 'Jennifer'];
        $lastNames = ['Smith', 'Johnson', 'Williams', 'Brown', 'Jones', 'Garcia'];

        // Create supervisors first
        foreach (range(1, 3) as $i) {
            $firstName = $firstNames[array_rand($firstNames)];
            $lastName = $lastNames[array_rand($lastNames)];

            User::create([
                'name' => "$firstName $lastName",
                'email' => strtolower($firstName).'.'.strtolower($lastName).'@example.com',
                'password' => bcrypt('password'),
                'is_supervisor' => true
            ]);
        }

        // Create regular employees
        foreach (range(1, 10) as $i) {
            $firstName = $firstNames[array_rand($firstNames)];
            $lastName = $lastNames[array_rand($lastNames)];

            $user = User::create([
                'name' => "$firstName $lastName",
                'email' => strtolower($firstName).'.'.strtolower($lastName).$i.'@example.com',
                'password' => bcrypt('password'),
                'is_supervisor' => false
            ]);

            Employee::create([
                'user_id' => $user->id,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'supervisor_id' => User::where('is_supervisor', true)->inRandomOrder()->first()->id
            ]);
        }
    }
}
