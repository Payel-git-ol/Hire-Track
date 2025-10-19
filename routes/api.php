<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeleteVacationController;
use App\Http\Controllers\GetUsersByNameController;
use App\Http\Controllers\GetVacationByIdController;
use App\Http\Controllers\GetVacationByNameController;
use App\Http\Controllers\PutVacancyFalseController;
use App\Http\Controllers\PutVacancyTrueController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateVacancyController;
use App\Http\Controllers\GetVacationController;
use App\Http\Controllers\GetUsersByIdController;


Route::post('/auth', [AuthController::class, 'auth']);



Route::get('/profile', function () {
    return response()->json(['message' => 'Authentication required'], 401);
})->name('login');



Route::middleware(['auth:sanctum'])->group(function () {

    Route::middleware(['role:admin'])->group(function () {
        Route::get('/test-admin', function (Request $request) {
            return response()->json([
                'message' => 'Admin access granted!',
                'user' => $request->user(),
            ]);
        });

        Route::get('/admin/dashboard', [AdminController::class, 'index']);
    });

    Route::middleware(['role:moderator,admin'])->group(function () {
        Route::get('/test-moderator', function (Request $request) {
            return response()->json([
                'message' => 'Moderator access granted!',
                'user' => $request->user(),
            ]);
        });

        Route::get('/get/vacation', [GetVacationController::class, 'getVacation']);
        Route::get('/get/vacation/{name}', [GetVacationByNameController::class, 'getVacationByName']);
        Route::get('/get/vacation/{id}', [GetVacationByIdController::class, 'getVacationById']);
        Route::delete('/delete/vacation/{id}', [DeleteVacationController::class, 'deleteVacation']);
        Route::put('/put/vacation/true/{id}', [PutVacancyTrueController::class, 'putVacancyTrue']);
        Route::put('/put/vacation/false/{id}', [PutVacancyFalseController::class, 'putVacancyFalse']);

    });

    Route::middleware(['role:user,moderator,admin'])->group(function () {
        Route::get('/test-user', function (Request $request) {
            return response()->json([
                'message' => 'User access granted!',
                'user' => $request->user(),
            ]);
        });

        Route::post('/create-vacancy', [CreateVacancyController::class, 'createVacancy']);
        Route::get('get/user/{name}', [GetUsersByNameController::class, 'getUsersByName']);
        Route::get('get/user/{id}', [GetUsersByIdController::class, 'getUserById']);
    });
});
