<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /*
    This is the main database seeder that populates your application with initial test data. Let me explain how it works in simple terms.

    What This Code Does
    Acts as the "master organizer" for all your test data

    Calls other seeders to fill different parts of your database

    Creates a structured way to populate your database with sample information
    */


    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DepartmentSeeder::class,
            UserSeeder::class,
            EmployeeSeeder::class,
        ]);
    }
}
