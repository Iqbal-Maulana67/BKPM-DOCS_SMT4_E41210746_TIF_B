<?php

use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SessionController;
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

Route::get('/session/create', [SessionController::class, 'create']);

Route::get('/session/show', [SessionController::class, 'show']);

Route::get('/session/delete', [SessionController::class, 'delete']);

Route::get('/index/{nama}', [PegawaiController::class, 'index']);

Route::get('/pegawai/{nama}', [PegawaiController::class, 'index_segment']);

Route::get('/form', [PegawaiController::class, 'formulir']);
Route::post('/form/result', [PegawaiController::class, 'proses'])->name('form-proses');
