<?php

namespace App\Http\Controllers;


// namespace App\Http\Controllers; → Tells PHP this is a controller (a manager that handles requests).
//use ... → These are like "importing tools" (e.g., Department, Employee, User are database models).


use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use App\Models\ClearanceRequest;


class ClearanceRequestController extends Controller
{

    //What it does:
    //Fetches all departments, employees, and supervisors from the database.
    //Passes them to a view (clearance_form.blade.php), which displays the form.
    //Key Terms:
    //::all() → Gets all records (like "get all departments").
    //where('is_supervisor', true) → Filters only users marked as supervisors.
    //compact() → Sends data to the view.



    public function create()
    {
        $departments = Department::all();

        // Fetch employees with their user data
        $employees = Employee::with('user')->get();

        // Fetch supervisors
        $supervisors = User::where('is_supervisor', true)->get();

        // Combine employees and supervisors into a single collection
        $allUsers = collect();

        // Add employees to the collection
        foreach ($employees as $employee) {
            if ($employee->user) {
                $allUsers->push([
                    'id' => $employee->user->id,
                    'name' => $employee->first_name . ' ' . $employee->last_name,
                    'type' => 'employee',
                ]);
            }
        }

        // Add supervisors to the collection
        foreach ($supervisors as $supervisor) {
            $allUsers->push([
                'id' => $supervisor->id,
                'name' => $supervisor->name,
                'type' => 'supervisor',
            ]);
        }



         // Fetch clearance requests
        $clearanceRequests = ClearanceRequest::with(['employee', 'supervisor', 'department'])->get();

        return view('clearance_form', compact('departments', 'allUsers', 'supervisors', 'clearanceRequests'));

    }


    //What it does:
    //Takes form data (user_id, supervisor_id, department_id) and saves it to the ClearanceRequest table.
    //now() → Records the current date/time.
    //After saving, it redirects back to home with a success message.

    public function store(Request $request)
    {

        $request->validate([
            'employee_id' => 'required|exists:employees,employee_id',
            'supervisor_id' => 'required|exists:users,id',
            'department_id' => 'required|exists:departments,department_id',
        ]);

        ClearanceRequest::create([
            'employee_id' => $request->employee_id,
            'supervisor_id' => $request->supervisor_id,
            'department_id' => $request->department_id,
            'date_submitted' => now(),
        ]);


        return redirect('/clearance-request')->with('success', 'Clearance request submitted!');
    }

    //What it does:
    //Takes an employeeId and finds their supervisor.
    //If no supervisor → Returns an error (404).
    //If found → Returns supervisor ID & name in JSON (like a data package).
    //Key Terms:
    //findOrFail() → Finds the employee or gives an error.
    //response()->json() → Sends data in a format that websites/apps can read.

    /*    public function getSupervisor($employeeId)
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

    */
}


/*
Summary (Simple Flow)
Employee fills form (create() loads departments, employees, supervisors).

Form submitted → store() saves the request.

If needed, the system can fetch an employee’s supervisor (getSupervisor()).

 Key Concepts for Beginners
 Models (Department, Employee, User) → Like Excel sheets (tables) in a database.
 Controller → The "manager" that handles requests and responses.
 :: (double colon) → Used to call static methods (like all(), where()).
 return view() → Loads a webpage (HTML + data).
 return response()->json() → Sends data (like for mobile apps).

 Example Scenario
John (employee) visits /clearance-form.

The system shows him a list of departments & supervisors.

He submits the form → His request is saved.

Later, the system can fetch John’s supervisor if needed.

*/
