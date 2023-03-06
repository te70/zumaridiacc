<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalesController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/sales/wines', [SalesController::class, 'showWines'])->name('showwines');
    Route::get('/sales/wines/product-form', [SalesController::class, 'productForm'])->name('productform');
    Route::get('/sales/wines/expenses', [SalesController::class, 'showExpenses'])->name('winesexpenses');
    Route::get('/sales/wines/expenses/form', [SalesController::class, 'wExpensesForm'])->name('wexpensesform');

    Route::get('/sales/bar', [SalesController::class, 'showBar'])->name('showbar');
    Route::get('/sales/bar/form', [SalesController::class, 'barProductForm'])->name('barform');
    Route::get('/sales/bar/expenses', [SalesController::class, 'showBExpenses'])->name('bexpenses');
    Route::get('/sales/bar/expenses/form', [SalesController::class, 'bExpensesForm'])->name('bexpensesform');

    Route::get('/sales/rooms', [SalesController::class, 'showRooms'])->name('showrooms');

    Route::get('/sales/playstation', [SalesController::class, 'showPlaystation'])->name('showplaystation');
    Route::get('/sales/ps', [SalesController::class, 'showPs'])->name('showps');

    Route::get('/sales/inbet', [SalesController::class, 'showInbet'])->name('showinbet');
    Route::get('/sales/ib', [SalesController::class, 'showIb'])->name('showib');
});

require __DIR__.'/auth.php';
