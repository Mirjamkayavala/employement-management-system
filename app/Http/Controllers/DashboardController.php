<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee; 

class DashboardController extends Controller
{
    //
    public function index()
    {
        // Logic to fetch data for the dashboard
        // $userData =
        $user = Auth::user();
        // $employees = Employee::all();
        return view('dashboard.index', compact('user'));
        if ($user->is_admin) {
            // If the user is an admin, you can show the full dashboard or redirect accordingly
            
            return view('admin.dashboard');
            // Or load all employee records
            // $employees = Employee::all();
        } else {
            // If the user is an employee, only show their details
            $employee = $user->employee;
            return view('employee.dashboard', compact('employee'));
        }

       
        return view('dashboard', compact('user'));
    }

    
}
