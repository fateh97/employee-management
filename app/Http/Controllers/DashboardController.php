<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEmployees = Employee::count();

        $employeesByDept = Department::withCount('employees')->get(['id', 'name']);

        $avgSalaryByDept = Department::withAvg('employees', 'salary')
            ->get(['id', 'name']);

        return response()->json([
            'totalEmployees' => $totalEmployees,
            'employeesByDept' => $employeesByDept,
            'avgSalaryByDept' => $avgSalaryByDept,
        ]);
    }
}
