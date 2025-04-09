<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
