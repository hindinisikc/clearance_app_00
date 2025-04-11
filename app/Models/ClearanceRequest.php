<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/*
This is a PHP Model for a Clearance Request System. It defines how a ClearanceRequest connects to other parts of the system (like Employees, Supervisors, and Departments).

It defines a ClearanceRequest model (like a "data manager" for clearance requests).

It tells the system:

Which employee made the request.

Which supervisor approves it.

Which department it belongs to.

*/

class ClearanceRequest extends Model
{

    protected $fillable = [
        'employee_id',
        'supervisor_id',
        'department_id',
        'date_submitted'
    ];


    public function employee() {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function supervisor() {
        return $this->belongsTo(User::class, 'supervisor_id');
    }

    public function department() {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
