<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\UserController;

Route::get('/barang', [BarangController::class, 'index']);
Route::post('/barang', [BarangController::class, 'store']);
Route::get('/login', [UserController::class, 'getAllUser']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/barang/{id_kategori}', [BarangController::class, 'getBarangByIdKategori']);