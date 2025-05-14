<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::post('/upload-file', [HomeController::class, 'uploadFile'])->name('uploadFile');


Route::controller(UserController::class)->group(function () {
    Route::get('/user/create', 'create')->name('create.user');
    Route::post('/user/create', 'store')->name('store.user');
    Route::get('/user/index', 'index')->name('index.user');
});
