<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\User;

class EmployeeController extends Controller
{
    
    // Admin only: List all employees
    public function index()
    {

        // dd('here');
        // $employees = User::where('role', 'employee')->get();
        $employees = Employee::paginate(10);
        // $employees = Employee::orderBy('created_at', 'desc')->get();
        // $employees = Employee::orderBy('created_at', 'desc')->paginate(10);
        // $employees = Employee::all();
        
        
        return view('employees.index', compact('employees'));
    }

    // Admin only: Show the form for creating a new employee

    public function create()
    {
        // $employees = Employee::paginate(5);
        if(auth()->user()->role !='admin'){
            return redirect()->back()->withErrors(['Only admin can create employee record(s)']);
        }
        return view('employees.create');
    }
    

    public function store(Request $request)
    {


        // return Employee::all();
        $request->validate([
            'employee_id' => 'required|numeric',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'contact_number' => 'required|integer',
            'date_of_birth' => 'required|date',
            'qualification' => 'required|string|max:255',
            'hired_date' => 'required|date',
            'job_title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
        ]);

        
        //checking if the employee id or email already exists
        $emp = Employee::where('employee_id',$request->employee_id)->orWhere('email',$request->email)->count();

        // return $emp;
        if($emp>0){

            return redirect()->back()->withErrors(['Employee Id or Email Address already exist']);
        }

        

        Employee::create([
                    'employee_id' => $request->employee_id,
                    'name' => $request->name,
                    'email' => $request->email,
                    'contact_number'=>$request->contact_number,
                    'hired_date' => $request->hired_date,
                    'date_of_birth' => $request->date_of_birth,
                    'qualification' => $request->qualification,
                    'job_title' => $request->job_title,
                    'department' => $request->department,
                ]);

        return redirect()->route('employees.create')->with('success', 'Employee created successfully.');

         // Authorization check
         if (Gate::denies('create', Employee::class)) {
            
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        // dd('Done');
    }

    //display employees details
    public function show()
    {

        //return "Hello World";
        // $employees = Employee::all();

        //search employee by employee ID or name
        if(!request()->query('query')){
        $employees = Employee::paginate(10);
        }else{
            $query= request()->query('query');
            $employees = Employee::where('name', 'LIKE', "%{$query}%")
            ->orWhere('employee_id', $query)->paginate(10);
            // ->get();

        }

        

        return view('employees.show', compact('employees'));

    }


    
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)

    {
        // dd('hhbfgvjbh');

        $request->validate([
            'employee_id' => 'required|numeric',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'contact_number' => 'required|integer',
            'date_of_birth' => 'required|date',
            'qualification' => 'required|string|max:255',
            'hired_date' => 'required|date',
            'job_title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
        ]);

        $employee->update($request->all());
        return redirect()->route('employees.create')->with('success', 'Employee updated successfully.');
        // return redirect()->route('employees.edit')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        // $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
    public function showProfile()
    {
        $employee = Auth::user()->employee; // Assuming User has one Employee
        return view('employees.profile', compact('employee'));
    }

    
}



