<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;

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
