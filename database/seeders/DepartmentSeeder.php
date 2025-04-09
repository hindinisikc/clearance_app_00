<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
