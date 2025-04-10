<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{

    /*
    This is a PHP Seeder for the Department model. It fills the database with initial department data. Let me explain it in simple terms.
    What This Code Does
    Creates a list of departments (like "HR", "IT", "Finance")
    Fills the database with these departments
    */


    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // This is a list of departments to be added to the database
        // You can add or remove departments as needed



        $departments = [
            'Human Resources',
            'Finance',
            'IT',
            'Marketing',
            'Operations',
            'Sales',
        ];

        foreach ($departments as $dept) {
            Department::create(['department' => $dept]);

        }
    }
}
