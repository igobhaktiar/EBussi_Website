<?php

use App\Http\Controllers\Api\ProdukController;
use App\Http\Controllers\Api\TransaksiController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::get('produk', [ProdukController::class, 'index']);
Route::post('checkout', [TransaksiController::class, 'store']);
Route::get('checkout/user/{id}', [TransaksiController::class, 'history']);
