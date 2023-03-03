<?php

use App\Http\Controllers\SalesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/sales/wines', [SalesController::class, 'wines'])->name('sales.wines');
Route::post('/sales/wines/expenses', [SalesController::class, 'winesExpenses'])->name('sales.expenses');
Route::get('/sales/wines-expenses', [SalesController::class, 'wExpenses'])->name('w.expenses');
Route::post('/sales/bar', [SalesController::class, 'bar']);
Route::post('/sales/rooms', [SalesController::class, 'rooms']);
Route::post('/sales/ps', [SalesController::class, 'playStation']);
Route::post('/sales/inbet', [SalesController::class, 'inbet']);
Route::get('/sales/product-list', [SalesController::class, 'productList']);
Route::post('/sales/add-product', [SalesController::class, 'addProduct'])->name('add.product');


