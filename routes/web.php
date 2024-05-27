<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoggerController;
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
    return view('auth/login');
});

Auth::routes([
    'register' => false,
]);

Route::group(['prefix' => 'master', 'middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/logger', [LoggerController::class, 'index'])->name('logger.index');
    Route::get('/logger/ajax', [LoggerController::class, 'ajax'])->name('logger.ajax');
});
