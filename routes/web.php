<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Authentication
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/authentication', [AuthController::class, 'authentication'])->name('authentication');
Route::post('/register-process', [AuthController::class, 'registerProcess'])->name('register-process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth.custom')->group(function () {
//Admin
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');
Route::get('/admin/departement', [DepartementController::class, 'index'])->name('admin-departement');
Route::get('/admin/employee', [EmployeeController::class, 'index'])->name('admin-employee');
Route::get('/admin/position', [PositionController::class, 'index'])->name('admin-position');
Route::get('/admin/user', [UserController::class, 'index'])->name('admin-user');
Route::get('/admin/profile', [ProfileController::class, 'index'])->name('admin-profile');

Route::get('/admin/dashboard-data', [DashboardController::class, 'read'])->name('admin-dashboarddata');

Route::get('/admin/departement-data', [DepartementController::class, 'read'])->name('admin-departementdata');
Route::put('/admin/departement-update', [DepartementController::class, 'update'])->name('admin-departementupdate');
Route::delete('/admin/departement-delete/{id}', [DepartementController::class, 'destroy'])->name('admin-departementdelete');
Route::post('/admin/departement-create', [DepartementController::class, 'store'])->name('admin-departementcreate');
Route::get('/admin/departement-export', [DepartementController::class, 'export'])->name('admin-departementexport');

Route::get('/admin/position-data', [PositionController::class, 'read'])->name('admin-positiondata');
Route::put('/admin/position-update', [PositionController::class, 'update'])->name('admin-positionupdate');
Route::delete('/admin/position-delete/{id}', [PositionController::class, 'destroy'])->name('admin-positiondelete');
Route::post('/admin/position-create', [PositionController::class, 'store'])->name('admin-positioncreate');
Route::get('/admin/position-export', [PositionController::class, 'export'])->name('admin-positionexport');

Route::get('/admin/employee-data', [EmployeeController::class, 'read'])->name('admin-employeedata');
Route::put('/admin/employee-update', [EmployeeController::class, 'update'])->name('admin-employeeupdate');
Route::delete('/admin/employee-delete/{id}', [EmployeeController::class, 'destroy'])->name('admin-employeedelete');
Route::post('/admin/employee-create', [EmployeeController::class, 'store'])->name('admin-employeecreate');
Route::get('/admin/employee-export', [EmployeeController::class, 'export'])->name('admin-employeeexport');

Route::get('/admin/user-data', [UserController::class, 'read'])->name('admin-userdata');
Route::put('/admin/user-update', [UserController::class, 'update'])->name('admin-userupdate');
Route::delete('/admin/user-delete/{id}', [UserController::class, 'destroy'])->name('admin-userdelete');

Route::get('/admin/profile-edit', [ProfileController::class, 'edit'])->name('admin-profileedit');
Route::post('/admin/profile-edit', [ProfileController::class, 'update'])->name('admin-editprocess');
});