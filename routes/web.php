<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\CompaniesController;
use  App\Http\Controllers\EmployeesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix('companies')->group(function () {
    Route::get('/get', [CompaniesController::class, 'get']);
    Route::get('/create', [CompaniesController::class, 'create']);
    Route::post('/add-employe', [CompaniesController::class, 'addEmploye']);
    Route::post('/remove-employe', [CompaniesController::class, 'removeEmploye']);
    Route::get('/update', [CompaniesController::class, 'update']);
    Route::get('/status', [CompaniesController::class, 'status']);
    Route::get('/delete', [CompaniesController::class, 'delete']); 
});

Route::prefix(' employees')->group(function () {
    Route::get('/get', [EmployeesController::class, 'get']);
    Route::get('/create', [EmployeesController::class, 'create']);
    Route::get('/update', [EmployeesController::class, 'update']);
    Route::get('/status', [EmployeesController::class, 'status']);
    Route::get('/delete', [EmployeesController::class, 'delete']);
});

Route::get('companies' ,function() {
    return view('companies');
});

Route::get('employees' ,function() {
    return view('employees');
});

Route::get('welcome' ,function() {
    return view('welcome');
});

Route::get('createEmployees' ,function() {
    return view('createEmployees');
});

Route::post('createEmployees/submit' ,function() {
    dd(Request::all());
})->name('create-employees-form');//именованое отслеживание url адресов

Route::get('createCompanies' ,function() {
    return view('createCompanies');
});

Route::post('createCompanies/submit' ,function() {
    dd(Request::all());
})->name('create-companies-form');