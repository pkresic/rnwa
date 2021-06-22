<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DepartmentController;
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
Route::prefix('contact')->group(function () {
    Route::get('', [ContactController::class, 'index'])->name('contact.list');
    Route::get('{id}', [ContactController::class, 'details'])->name('contact.details');
});
Route::prefix('address')->group(function () {
    Route::get('', [AddressController::class, 'index'])->name('address.list');
    Route::get('{id}', [AddressController::class, 'details'])->name('address.details');
});
Route::prefix('department')->group(function () {
    Route::get('', [DepartmentController::class, 'index'])->name('department.list');
    Route::get('{id}', [DepartmentController::class, 'details'])->name('department.details');
});
