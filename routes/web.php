<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ProfileController;
use App\Models\Departement;

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

//Admin
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');
Route::get('/admin/departement', [DepartementController::class, 'index'])->name('admin-departement');
Route::get('/admin/employee', [EmployeeController::class, 'index'])->name('admin-employee');
Route::get('/admin/position', [PositionController::class, 'index'])->name('admin-position');
Route::get('/admin/profile', [ProfileController::class, 'index'])->name('admin-profile');

Route::get('/admin/departement-data', [DepartementController::class, 'read'])->name('admin-departementdata');
Route::put('/admin/departement-update', [DepartementController::class, 'update'])->name('admin-departementupdate');
Route::delete('/admin/departement-delete/{id}', [DepartementController::class, 'destroy'])->name('admin-departementdelete');
Route::post('/admin/departement-create', [DepartementController::class, 'store'])->name('admin-departementcreate');
Route::get('/admin/departement-export', [DepartementController::class, 'export'])->name('admin-departementexport');