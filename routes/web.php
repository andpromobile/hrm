<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\PayrollController;

Route::get('/', function () {
    return view('welcome');
});

// ROUTE BAWAAN BREEZE
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('tasks', TaskController::class);
Route::get('/tasks/{task}/mark-as-done', [TaskController::class, 'markAsDone'])->name('tasks.markAsDone');
Route::get('/tasks/{task}/mark-as-pending', [TaskController::class, 'markAsPending'])->name('tasks.markAsPending');

// Handle Department routes
Route::resource('departments', DepartmentController::class);

// Handle Role Routes
Route::resource('roles', RoleController::class);

// Handle Precense routes
Route::resource('presences', PresenceController::class);

// Handle Leave Request routes
Route::resource('leave-requests', LeaveRequestController::class);

// Handle Payroll routes
Route::resource('payrolls', PayrollController::class);

// Handle Employee routes
Route::resource('employees', EmployeeController::class);
Route::get('/employees/{employee}/mark-as-done', [EmployeeController::class, 'markAsDone'])->name('employees.markAsDone');
Route::get('/employees/{employee}/mark-as-pending', [EmployeeController::class, 'markAsPending'])->name('employees.markAsPending');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
