<?php

use App\Http\Controllers\SalesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/sales/wines', [SalesController::class, 'wines']);
Route::post('/sales/bar', [SalesController::class, 'bar']);
Route::post('/sales/rooms', [SalesController::class, 'rooms']);
Route::post('/sales/ps', [SalesController::class, 'playStation']);
Route::post('/sales/inbet', [SalesController::class, 'inbet']);
Route::post('/sales/product-list', [SalesController::class, 'product-list']);