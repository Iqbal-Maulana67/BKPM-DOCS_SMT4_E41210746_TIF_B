<?php

use App\Http\Controllers\DetailProfileController;
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

Route::get('home', function() {
    return view('home');
});

Route::get('/user', [DetailProfileController::class, 'index'])->name('user.index');
Route::post('/user', [DetailProfileController::class, 'store'])->name('user.store');
Route::get('/user/create', [DetailProfileController::class, 'create'])->name('user.create');
Route::get('/user/{user}', [DetailProfileController::class, 'show'])->name('user.show');
Route::put('/user/{user}', [DetailProfileController::class, 'update'])->name('user.update');
Route::delete('/user/{user}', [DetailProfileController::class, 'destroy'])->name('user.destroy');
Route::get('/user/{user}/edit', [DetailProfileController::class, 'edit'])->name('user.edit');