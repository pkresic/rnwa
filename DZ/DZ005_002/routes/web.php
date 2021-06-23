<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

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
})->name('welcome');
Route::middleware(['auth.basic'])->group(function () {
    Route::prefix('contact')->group(function () {
        Route::get('', [ContactController::class, 'index'])->name('contact.list');
        Route::get('{id}', [ContactController::class, 'details'])->name('contact.details');
    });
    Route::prefix('address')->group(function () {
        Route::get('', [AddressController::class, 'index'])->name('address.list');
        Route::get('{id}', [AddressController::class, 'details'])->name('address.details');
        Route::get('delete/{id}', [AddressController::class, 'delete'])->name('address.delete');
    });
    Route::prefix('department')->group(function () {
        Route::get('', [DepartmentController::class, 'index'])->name('department.list');
        Route::get('{id}', [DepartmentController::class, 'details'])->name('department.details');
    });
    Route::prefix('employee')->group(function () {
        Route::get('', [EmployeeController::class, 'index'])->name('employee.list');
        Route::get('{id}', [EmployeeController::class, 'details'])->name('employee.details');
        Route::get('delete/{id}', [EmployeeController::class, 'delete'])->name('employee.delete');
    });
});
Route::prefix('login')->group(function () {
    Route::get('', [AuthController::class, 'index'])->name('login');
    Route::post('', [AuthController::class, 'login'])->name('auth.login');
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::prefix('google')->group(function () {
        Route::get('', [AuthController::class, 'google_login'])->name('auth.google');

        Route::get('callback', [AuthController::class, 'google_callback']);
    });
});
