<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('/store', [HomeController::class, 'store'])->name('file-store');

Route::get('/{id}/delete', [HomeController::class, 'destroy'])->name('file-destroy');
Route::get('/{id}/download',[HomeController::class, 'download'])->name('file-download');

