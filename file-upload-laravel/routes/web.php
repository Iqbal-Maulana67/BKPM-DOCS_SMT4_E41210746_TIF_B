<?php

use App\Http\Controllers\UploadController;
use GuzzleHttp\Psr7\UploadedFile;
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

Route::get('/upload', [UploadController::class, 'upload'])->name('upload');

Route::post('/upload/proses', [UploadController::class, 'proses_upload'])->name('upload.proses');

Route::post('/upload/resize_image', [UploadController::class, 'resize_upload'])->name('upload.resize');

Route::get('/dropzone', [UploadController::class, 'dropzone'])->name('dropzone');

Route::post('/dropzone/store', [UploadController::class, 'dropzone_store'])->name('dropzone.store');

Route::get('/pdf_upload', [UploadController::class, 'pdf_upload'])->name('pdf.upload');

Route::post('/pdf/store', [UploadController::class, 'pdf_store'])->name('pdf.store');