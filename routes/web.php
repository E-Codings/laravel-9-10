<?php

use App\Http\Controllers\EmployeeController;
use App\Models\Employee;
use Illuminate\Support\Facades\Route;

Route::get('/',[EmployeeController::class,'viewEmployeeFile']);
Route::get('/addEmployee',[EmployeeController::class,'addEmployeeFrm']);
Route::post('/createEmployee', [EmployeeController::class, 'createEmployee']);
Route::get('/update/{id}', [EmployeeController::class,'openUpdateFrm']);
Route::put('/updateEmployee/{id}', [EmployeeController::class, 'update']);
