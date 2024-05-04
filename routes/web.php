<?php

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
    return view('auth.login');
});
Route::get('/halo', function () {
    return view('auth.login');
});

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('dashboard');
    });
    Route::get('/barang', [App\Http\Controllers\barangController::class, 'index']);
    Route::get('/barang/create', [App\Http\Controllers\barangController::class, 'create']);
    Route::post('/barang/store', [App\Http\Controllers\barangController::class, 'store']);
    Route::get('/barang/tambah/{id}', [App\Http\Controllers\barangController::class, 'tambah']);
    Route::get('/barang/kurang/{id}', [App\Http\Controllers\barangController::class, 'kurang']);
    Route::post('/barang/tambah/proses', [App\Http\Controllers\barangController::class, 'tambah_proses']);
    Route::post('/barang/kurang/proses', [App\Http\Controllers\barangController::class, 'kurang_proses']);

    Route::get('/user', [App\Http\Controllers\userController::class, 'index']);
    Route::get('/user/create', [App\Http\Controllers\userController::class, 'create']);
    Route::post('/user/store', [App\Http\Controllers\userController::class, 'store']);
    Route::get('/user/edit/{id}', [App\Http\Controllers\userController::class, 'edit']);
    Route::post('/user/update/{id}', [App\Http\Controllers\userController::class, 'update']);
    Route::post('/user/disable/{id}', [App\Http\Controllers\userController::class, 'destroy']);

    Route::get('/kasir', [App\Http\Controllers\kasirController::class, 'index']);
    Route::get('/kasir/custom', [App\Http\Controllers\kasirController::class, 'custom']);
    Route::post('/kasir/custom/store', [App\Http\Controllers\kasirController::class, 'custom_store']);
    Route::post('/kasir/store', [App\Http\Controllers\kasirController::class, 'store']);
    Route::post('/kasir/bayar', [App\Http\Controllers\kasirController::class, 'sumary']);
    Route::post('/kasir/tambahlist', [App\Http\Controllers\kasirController::class, 'tambahlist']);
    Route::get('/kasir/sd', [App\Http\Controllers\kasirController::class, 'sessiondestroyer']);
    Route::get('/testbot', [App\Http\Controllers\kasirController::class, 'testbot']);

    Route::get('/konfirmasi', [App\Http\Controllers\konfirmasiController::class, 'konfirmasi']);
    Route::get('/konfirmasi/manual', [App\Http\Controllers\konfirmasiController::class, 'manual']);
    Route::post('/konfirmasi/manual/store', [App\Http\Controllers\konfirmasiController::class, 'manual_store']);
    Route::get('/konfirmasi/terima/{id}', [App\Http\Controllers\konfirmasiController::class, 'terimaKonfirmasi']);
    Route::get('/konfirmasi/tolak/{id}', [App\Http\Controllers\konfirmasiController::class, 'tolakKonfirmasi']);



});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
