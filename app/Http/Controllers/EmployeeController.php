<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function viewEmployeeFile(){
        // $employees = Employee::all();
        $employees = Employee::orderBy('id','desc')->get();
        return view('viewEmployee', compact('employees'));
    }

    public function addEmployeeFrm(){
        return view('addEmployee');
    }

    public function createEmployee(Request $request){

        $validate = $request->validate([
            'name' => 'required|max:100|min:2',
            'gender' => 'required|min:4|max:6',
            'position' => 'required',
            'salary' => 'required|numeric',
            'address' => 'required'
        ]);

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
        // return redirect('/addEmployee')->with('success','Employee create success');

        return back()->with('success','Employee create success');
    }

    public function openUpdateFrm($id){
        // $employee = Employee::find($id);
        $employee = Employee::where('id','=',$id)->first();
        return view('update', compact('employee'));
    }

    public function update($id, Request $request){
        $validate = $request->validate([
            'name' => 'required|max:100|min:2',
            'gender' => 'required|min:4|max:6',
            'position' => 'required',
            'salary' => 'required|numeric',
            'address' => 'required'
        ]);

        $name = $request->name;
        $gender = $request->input('gender');
        $position = $request->position;
        $salary = $request->salary;
        $address = $request->address;

        $employee = Employee::find($id);
        $employee->name = $name;
        $employee->gender = $gender;
        $employee->position = $position;
        $employee->salary = $salary;
        $employee->address = $address;

        $employee->save();

        return back()->with('success','Employee create success');
    }
}
