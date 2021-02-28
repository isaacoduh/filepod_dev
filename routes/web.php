<?php

use App\Http\Controllers\FileController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('file', [App\Http\Controllers\FileController::class, 'create'])->name('file.create');
Route::post('file', [App\Http\Controllers\FileController::class, 'store'])->name('file.store');
Route::get('file/{id}', [App\Http\Controllers\FileController::class, 'show'])->name('file.show');
Route::get('file/{id}/edit', [App\Http\Controllers\FileController::class, 'edit'])->name('file.edit');
Route::delete('file/{id}/delete', [App\Http\Controllers\FileController::class, 'delete'])->name('file.destroy');
Route::get('file/{id}/download', [App\Http\Controllers\FileController::class, 'download'])->name('file.download');
