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

require __DIR__ . '/auth.php';

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('companies')->group(function () {
        Route::get('/', [CompaniesController::class, "get"])->name('companies');
        Route::match(['get', 'post'], '/create', [CompaniesController::class, "create"])->name("create_company");
        Route::post('delete/{id}', [CompaniesController::class, 'delete'])->name('delete_companies');
        Route::match(['get', 'post'], 'edit/{id}', [CompaniesController::class, 'edit'])->name('edit_company');
        Route::post('assign/employee', [CompaniesController::class, 'assignEmployee']);
    });

    Route::prefix('employees')->group(function () {
        Route::get('/', [EmployeesController::class, "get"])->name('employees');
        Route::match(['get', 'post'], '/create', [EmployeesController::class, "create"])->name("create_employee");
        Route::post('delete/{id}', [EmployeesController::class, 'delete'])->name('delete_employees');
        Route::match(['get', 'post'], 'edit/{id}', [EmployeesController::class, 'edit'])->name('edit_employee');
    });
});

// Route::post('create_employees/submit', [EmployeesController::class, "create"])->name('create-employees-form'); //именованое отслеживание url адресов

// Route::get('create_companies', function () {
//     return view('create_companies');
// });

// Route::post('create_companies/submit', [CompaniesController::class, "create"])->name('create-companies-form');

// Route::post('/employees/submit', [EmployeesController::class, "submit"])->name('create-employees-form');

// Route::post('/companies/submit', [CompaniesController::class, "submit"])->name('create-companies-form');
