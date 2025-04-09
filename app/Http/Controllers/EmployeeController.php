<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    public function viewEmployeeFile(){
        Log::info("function work");
        return view('viewEmployee');
    }

    public function addEmployeeFrm(){
        return view('addEmployee');
    }

    public function createEmployee(Request $request){
        $name = $request->name;
        $gender = $request->input('gender');
        $position = $request->position;
        $salary = $request->salary;
        $address = $request->address;
        // dd($request, $name, $gender);

        Employee::create([ // insert data to db
            'name' => $name,
            'gender' => $gender,
            'position' => $position,
            'salary' => $salary,
            'address' => $address
        ]);
        return redirect('/addEmployee');
    }
}
