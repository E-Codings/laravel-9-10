<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::post('/upload-file', [HomeController::class, 'uploadFile'])->name('uploadFile');
Route::get('/user/create', [UserController::class, 'create'])->name('create.user');
