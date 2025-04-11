<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        // Get all non-supervisor users
        $users = User::where('is_supervisor', false)->get();

        // Create employees for each user
        foreach ($users as $user) {
            Employee::firstOrCreate(
                ['user_id' => $user->id],
                [
                    'first_name' => explode(' ', $user->name)[0],
                    'last_name' => explode(' ', $user->name)[1],
                    'supervisor_id' => User::where('is_supervisor', true)->inRandomOrder()->first()->id
                ]
            );
        }
    }
}
