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
    Route::get('/dashboard/chart-machine1', [DashboardController::class, 'chartMachine1'])->name('dashboard.chart-machine1');
    Route::get('/dashboard/chart-machine2', [DashboardController::class, 'chartMachine2'])->name('dashboard.chart-machine2');

    Route::get('/logger', [LoggerController::class, 'index'])->name('logger.index');
    Route::get('/logger/create', [LoggerController::class, 'create'])->name('logger.create');
    Route::post('/logger/store', [LoggerController::class, 'store'])->name('logger.store');
    Route::get('/logger/{id}/show', [LoggerController::class, 'show'])->name('logger.show');
    Route::delete('/logger/{id}/destroy', [LoggerController::class, 'destroy'])->name('logger.destroy');
    Route::get('/logger/ajax', [LoggerController::class, 'ajax'])->name('logger.ajax');
    Route::get('/logger/{id}/ajax-show', [LoggerController::class, 'ajaxShow'])->name('logger.ajax-show');
    Route::get('/logger/{id}/chart', [LoggerController::class, 'chart'])->name('logger.chart');
    Route::get('/logger/{id}/chart-voltage', [LoggerController::class, 'chartVoltage'])->name('logger.chart-voltage');
    Route::get('/logger/{id}/chart-current', [LoggerController::class, 'chartCurrent'])->name('logger.chart-current');
});
