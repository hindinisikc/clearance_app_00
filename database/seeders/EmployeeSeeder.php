<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Arr;



class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supervisors = User::where('is_supervisor', true)->pluck('id')->toArray();
        $employees = User::where('is_supervisor', false)->get();

        foreach ($employees as $user) {
            Employee::create([
                'user_id' => $user->id,
                'first_name' => explode(' ', $user->name)[0],
                'last_name' => explode(' ', $user->name)[1] ?? 'Lastname',
                // You can add supervisor_id here if you add it to employees table
                'supervisor_id' => Arr::random($supervisors),
            ]);
        }
    }
}
