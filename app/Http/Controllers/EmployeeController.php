<?php

namespace App\Http\Controllers;

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
}
