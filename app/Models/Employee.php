<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;


    protected $table = "employees";
    
    protected $fillable = [
        'employee_id',
        'name',
        'email',
        'hired_date',
        'date_of_birth',
        'contact_number',
        'qualification',
        'job_title',
        'department',
    ];

    // public static $rules = [
    //     'employee_id' => 'required|unique:employees|numeric|min:1',
    //     'email' => 'required|email|unique:employees',
        
    // ];
  
}



