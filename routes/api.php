<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/hello-world', function () {
    return "Hello API";
});

Route::post('/login',[AuthController::class, 'login']);

Route::middleware('jwt.verify')->group(function () {

    Route::post('/logout',[AuthController::class, 'logout']);

    Route::controller(CourseController::class)->group(function () {
        Route::prefix('cousre')->group(function () {
            Route::get('/', 'index');
            Route::get('/{id}', 'show');
            Route::post('/', 'store');
            Route::put('/{id}', 'update');
            Route::delete('/delete/{id}', 'delete');
        });
    });

    Route::controller(UserController::class)->group(function () {
        Route::prefix('user')->group(function () {
            Route::get('/', 'index');
        });
    });
});
