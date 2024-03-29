<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/upload', [FileController::class, 'upload'])->name('upload');
Route::get('/file/{file}', [FileController::class, 'file'])->name('file');
Route::get('/files', [FileController::class, 'fileIndex'])->name('fileIndex');
Route::get('/download/{file}', [FileController::class, 'download'])->name('download');
