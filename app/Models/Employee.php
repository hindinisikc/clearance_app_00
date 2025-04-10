<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



/*
This is a PHP Model for an Employee System. It defines how an Employee connects to other parts of the system (like Users and Supervisors).
It defines an Employee model (like a "data manager" for employees).
It tells the system:
Which user is the employee.
Which supervisor manages the employee.
*/

class Employee extends Model
{
    protected $primaryKey = 'employee_id';
    public $incrementing = true;


    public function user() {
        return $this->belongsTo(User::class);
    }

    public function supervisor()
    {
        return $this->belongsTo(User::class, 'supervisor_id', 'id'); // Assuming 'supervisor_id' is the foreign key
    }

    public function getSupervisor($employeeId)
    {
        // Fetch the employee and the supervisor
        $employee = Employee::with('supervisor')->findOrFail($employeeId);

        // Return supervisor data as JSON
        return response()->json([
            'supervisor' => $employee->supervisor
        ]);
    }
}
