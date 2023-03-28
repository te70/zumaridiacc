<?php

use App\Http\Controllers\RentalController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\StaffController;
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
Route::post('/sales/ps', [SalesController::class, 'playStation'])->name('sales.ps');
Route::post('/sales/inbet', [SalesController::class, 'inbet'])->name('sales.ib');
Route::get('/sales/product-list', [SalesController::class, 'productList']);
Route::post('/sales/add-product', [SalesController::class, 'addProduct'])->name('add.product');
Route::post('/sales/bar/add-product', [SalesController::class, 'bar'])->name('bar.product');
Route::post('/sales/bar/expenses', [SalesController::class, 'barExpenses'])->name('bar.expenses');

Route::post('/add/rooms', [RoomController::class, 'addRooms'])->name('addrooms');

Route::post('/add/staff', [StaffController::class, 'store'])->name('addstaff');

Route::post('/add/reservation', [RoomController::class, 'reserveRoom'])->name('reserveroom');

Route::post('/rentals/tenants', [RentalController::class, 'tenant'])->name('tenant');
Route::post('/rentals/houses', [RentalController::class, 'house'])->name('house');

