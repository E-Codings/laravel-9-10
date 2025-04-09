<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[EmployeeController::class,'viewEmployeeFile']);
Route::get('/addEmployee',[EmployeeController::class,'addEmployeeFrm']);
Route::post('/createEmployee', [EmployeeController::class, 'createEmployee']);
