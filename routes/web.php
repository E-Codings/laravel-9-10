<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [StudentController::class, 'index']);
// Route::post('/store-student',[StudentController::class,'store']);

Route::controller(StudentController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/store-student', 'store')->name('store');
    Route::get('/create', 'create')->name('create');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/update/{id}', 'update')->name('update');
    Route::get('/delete/{id}', 'modalDelete')->name('delete');
    Route::delete('/destroy', 'destroy')->name('destroy');
});
