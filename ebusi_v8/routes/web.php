<?php

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
    return view('main2');
});


Route::get('/home', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ADMIN
Route::get('dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index']);

// ADMIN - Data Produk
Route::get('index-read', [App\Http\Controllers\Backend\ProdukController::class, 'index']);
Route::get('create', [App\Http\Controllers\Backend\ProdukController::class, 'create']);
Route::post('store', [App\Http\Controllers\Backend\ProdukController::class, 'store']);

// USER - Data Profile
Route::get('profile', [App\Http\Controllers\ProfileController::class, 'index']);
Route::post('profile', [App\Http\Controllers\ProfileController::class, 'update']);

//USER - Katalog Produk
Route::get('pesan/{id}', [App\Http\Controllers\PesanController::class, 'index']);