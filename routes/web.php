<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::resource('cars', App\Http\Controllers\CarController::class);
Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('informasiUsers', App\Http\Controllers\InformasiUserController::class);
Route::resource('rents', App\Http\Controllers\RentController::class);

Route::get('calculationRents/', [App\Http\Controllers\CalculationRentController::class, 'index'])->name("calculationRents.index");
Route::get('calculationRents/create/{id}', [App\Http\Controllers\CalculationRentController::class, 'create'])->name("calculationRents.create");
Route::post('calculationRents/create/{id}', [App\Http\Controllers\CalculationRentController::class, 'store'])->name("calculationRents.store");