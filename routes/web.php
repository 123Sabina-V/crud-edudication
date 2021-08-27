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
    Route::get('/post/create', [CompaniesController::class, 'create']);
    Route::post('/post', [CompaniesController::class, 'store']);
    Route::post('/add-employe', [CompaniesController::class, 'addEmploye']);
    Route::post('/remove-employe', [CompaniesController::class, 'removeEmploye']);
    Route::get('/update', [CompaniesController::class, 'update']);
    Route::get('/status', [CompaniesController::class, 'status']);
    Route::get('/delete', [CompaniesController::class, 'delete']); 
});

Route::prefix(' employees')->group(function () {
    Route::get('/get', [EmployeesController::class, 'get']);
    Route::get('/post/create', [EmployeesController::class, 'create']);
    Route::post('/post', [EmployeesController::class, 'store']);
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

Route::get('create_employees' ,function() {
    return view('create_employees');
});

Route::post('create_employees/submit',[EmployeesController::class, "create"])->name('create-employees-form');//именованое отслеживание url адресов

Route::get('create_companies' ,function() {
    return view('create_companies');
});

Route::post('create_companies/submit',[CompaniesController::class, "create"])->name('create-companies-form');