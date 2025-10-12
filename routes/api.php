<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;

Route::apiResource('departments', DepartmentController::class);
Route::apiResource('employees', EmployeeController::class)->parameters([
    'employees' => 'id'
]);

// Alternative way for update employee using POST
Route::post('/employees/{id}/edit', [EmployeeController::class, 'updateEmployee']);

// Alternative way for update department using POST
Route::post('/departments/{id}/edit', [DepartmentController::class, 'updateDepartment']);

Route::get('/dashboard', [DashboardController::class, 'index']);
