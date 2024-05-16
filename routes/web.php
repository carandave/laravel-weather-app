<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WeatherController;

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

Route::permanentRedirect('/', '/login');

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register/insert', [AuthController::class, 'registerInsert'])->name('register-insert');

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login/insert', [AuthController::class, 'loginInsert'])->name('login-insert');
});

Route::middleware(['auth'])->group(function () {
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/home', [AuthController::class, 'home'])->name('home');

    Route::post('/home', [WeatherController:: class, 'weatherSearch'])->name('weather-search');
});
