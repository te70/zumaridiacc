<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

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
    Route::get('/ps/edit/{id}', [SalesController::class, 'psEditView'])->name('editps');

    Route::get('/sales/inbet', [SalesController::class, 'showInbet'])->name('showinbet');
    Route::get('/sales/ib', [SalesController::class, 'showIb'])->name('showib');

    Route::get('/rooms', [RoomController::class, 'index'])->name('showroom');
    Route::get('/rooms/manage', [RoomController::class,'manage'])->name('manageroom');

    Route::get('/staff', [StaffController::class, 'index'])->name('staff');

    Route::get('/rentals', [RentalController::class, 'index'])->name('rentals');
    Route::get('/rentals/tenants', [RentalController::class, 'tenantView'])->name('tenantsview');
    Route::get('/rentals/tenant', [RentalControlller::class, 'show'])->name('tenantshow');

    Route::get('/users', [UserController::class, 'index'])->name('users');

    Route::get('/complaints', [ComplaintController::class, 'index'])->name('complaints');

    Route::get('/settings', [UserController::class, 'settings'])->name('settings');
});

require __DIR__.'/auth.php';
