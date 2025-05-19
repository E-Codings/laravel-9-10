<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login',[AuthenticationController::class, 'loginForm'])->name('login');
Route::post('/login',[AuthenticationController::class, 'login'])->name('loginSubmit');


Route::middleware(['auth'])->group(function(){

    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
    
    Route::post('/upload-file', [HomeController::class, 'uploadFile'])->name('uploadFile');
    Route::get('/migrate', [HomeController::class, 'migrate']);
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::controller(UserController::class)->group(function () {
        Route::get('/user/create', 'create')->name('create.user');
        Route::post('/user/create', 'store')->name('store.user');
        Route::get('/user/index', 'index')->name('index.user');
    });

});
