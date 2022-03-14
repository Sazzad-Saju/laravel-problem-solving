<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
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
    return view('admin.auth.login');
});

Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard.index');
Route::get('/basic-table',[DashboardController::class, 'basicTable'])->name('admin.table.basic.table');
Route::get('/data-table',[DashboardController::class, 'dataTable'])->name('admin.table.data.table');
Route::get('/charts',[DashboardController::class, 'charts'])->name('admin.dashboard.charts');