<?php

use App\Http\Controllers\apiTuscanyController;
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

Route::get('/apiTuscany', [apiTuscanyController::class,'index'])->name('apiTuscany');

Route::get('/apiTuscany/categories', [apiTuscanyController::class,'categories'])->name('categories');

Route::get('/apiTuscany/categories/{language}', [apiTuscanyController::class,'categories'])->name('categories');

Route::get('/apiTuscany/categories/{id}', [apiTuscanyController::class,'categories'])->name('categories');
