<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use App\Models\ClearanceRequest;


class ClearanceRequestController extends Controller
{
        public function create()
    {
        $departments = Department::all();
        $employees = Employee::all();
        $supervisors = User::where('is_supervisor', true)->get();

        return view('clearance_form', compact('departments', 'employees', 'supervisors'));
    }


    public function store(Request $request) {
        ClearanceRequest::create([
            'user_id' => $request->user_id,
            'supervisor_id' => $request->supervisor_id,
            'department_id' => $request->department_id,
            'date_submitted' => now(),
        ]);
        return redirect('/')->with('success', 'Clearance request submitted!');
    }

        public function getSupervisor($employeeId)
    {
        $employee = Employee::with('supervisor')->findOrFail($employeeId);

        if (!$employee->supervisor) {
            return response()->json(['error' => 'Supervisor not found'], 404);
        }

        return response()->json([
            'supervisor' => [
                'id' => $employee->supervisor->id,
                'name' => $employee->supervisor->name,
            ]
        ]);
    }


}
