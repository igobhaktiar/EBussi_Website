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

// ADMIN - Kelola Data User
Route::get('users', [App\Http\Controllers\Backend\DataUserController::class, 'index'])->name('users.index');
Route::get('user-index', [App\Http\Controllers\Backend\DataUserController::class, 'index']);
Route::delete('hapus/{id}', [App\Http\Controllers\Backend\DataUserController::class, 'delete']);
Route::get('tambah_user', [App\Http\Controllers\Backend\DataUserController::class, 'create']);
Route::post('storeuser', [App\Http\Controllers\Backend\DataUserController::class, 'store']);
Route::get('edituser/{id}', [App\Http\Controllers\Backend\DataUserController::class, 'edit'])->name('edituser.edit');
Route::post('edituser/{id}', [App\Http\Controllers\Backend\DataUserController::class, 'update'])->name('edituser.update');
Route::get('detail/{id}', [App\Http\Controllers\Backend\DataUserController::class, 'detail']);
Route::get('cetak-user', [App\Http\Controllers\Backend\DataUserController::class, 'cetak_user']);

// ADMIN - Data Produk
Route::get('index-read', [App\Http\Controllers\Backend\ProdukController::class, 'index']);
Route::get('create', [App\Http\Controllers\Backend\ProdukController::class, 'create']);
Route::post('store', [App\Http\Controllers\Backend\ProdukController::class, 'store']);
Route::get('edit/{id}', [App\Http\Controllers\Backend\ProdukController::class, 'edit']);
Route::post('edit/{id}', [App\Http\Controllers\Backend\ProdukController::class, 'update']);
Route::delete('destroy/{id}', [App\Http\Controllers\Backend\ProdukController::class, 'delete']);
Route::get('cetak-produk', [App\Http\Controllers\Backend\ProdukController::class, 'cetak']);

// ADMIN - Data Kategori Produk
Route::get('kategori-index', [App\Http\Controllers\Backend\KategoriProdukController::class, 'index']);
Route::get('tambah', [App\Http\Controllers\Backend\KategoriProdukController::class, 'tambah_kat']);
Route::post('kat_store', [App\Http\Controllers\Backend\KategoriProdukController::class, 'store']);
Route::delete('hapusy/{id}', [App\Http\Controllers\Backend\KategoriProdukController::class, 'delete']);


//ADMIN - Profil Admin
Route::get('profile-admin', [App\Http\Controllers\Backend\ProfilAdminController::class, 'index']);
Route::post('profile-admin', [App\Http\Controllers\Backend\ProfilAdminController::class, 'update']);

Route::get('admin/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('admin.dashboard')->middleware('is_admin');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// USER - Data Profile
Route::get('profile', [App\Http\Controllers\ProfileController::class, 'index']);
Route::post('profile', [App\Http\Controllers\ProfileController::class, 'update']);

//USER - Katalog Produk
Route::get('pesan/{id}', [App\Http\Controllers\PesanController::class, 'index']);
Route::post('pesan/{id}', [App\Http\Controllers\PesanController::class, 'pesan']);
Route::get('check-out', [App\Http\Controllers\PesanController::class, 'check_out']);
Route::delete('check-out/{id}', [App\Http\Controllers\PesanController::class, 'delete']);
Route::get('keranjangcheckout', [App\Http\Controllers\PesanController::class, 'keranjanglanjut']);
Route::get('konfirmasi-check-out', [App\Http\Controllers\PesanController::class, 'konfirmasi']);

// USER - History
Route::get('history', [App\Http\Controllers\HistoryController::class, 'index']);
Route::get('history/{id}', [App\Http\Controllers\HistoryController::class, 'detail']);

// ADMIN - DATA PEMBELIAN
Route::get('index-pembelian', [App\Http\Controllers\Backend\DataPembelianController::class, 'index']);
Route::get('detail-pembelian/{id}', [App\Http\Controllers\Backend\DataPembelianController::class, 'detail']);
// Route::get('edit-status/{id}', [App\Http\Controllers\Backend\DataPembelianController::class, 'edit']);
Route::post('edit-status/{id}', [App\Http\Controllers\Backend\DataPembelianController::class, 'update']);
// Route::get('store-status/{id}', [App\Http\Controllers\Backend\DataPembelianController::class, 'store']);
Route::get('cetak-pembelian', [App\Http\Controllers\Backend\DataPembelianController::class, 'cetak']);