<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('departments', DepartmentController::class);
    Route::apiResource('employees', EmployeeController::class)->parameters([
        'employees' => 'id'
    ]);

    // Alternative way for update employee using POST
    Route::post('/employees/{id}/edit', [EmployeeController::class, 'updateEmployee']);
    // Alternative way for delete employee using POST
    Route::post('/employees/{id}/delete', [EmployeeController::class, 'destroyEmployee']);

    // Alternative way for update department using POST
    Route::post('/departments/{id}/edit', [DepartmentController::class, 'updateDepartment']);
    // Alternative way for delete employee using POST
    Route::post('/departments/{id}/delete', [DepartmentController::class, 'destroyDepartment']);

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
});
