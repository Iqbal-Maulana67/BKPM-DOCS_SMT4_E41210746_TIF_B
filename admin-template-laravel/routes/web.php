<?php

use App\Http\Controllers\backend\PendidikanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\backend\PengalamanKerjaController;
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
});

Route::group(['namespace' => ''], function (){
    Route::resource('dashboard', DashboardController::class);
    Route::resource('pendidikan', PendidikanController::class);
});

Route::resource('pengalaman_kerja', PengalamanKerjaController::class);