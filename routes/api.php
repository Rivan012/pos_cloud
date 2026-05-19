<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\DiskonController;
use App\Http\Controllers\Api\KasirController;
use App\Http\Controllers\Api\PenjualanController;
use App\Http\Controllers\Api\KategoriBarangController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('users', UserController::class);
Route::apiResource('kategori-barang', KategoriBarangController::class);
Route::apiResource('barang', BarangController::class);
Route::apiResource('diskon', DiskonController::class);
Route::apiResource('kasir', KasirController::class);
Route::apiResource('penjualan', PenjualanController::class);