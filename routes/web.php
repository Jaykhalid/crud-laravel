<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TypeController;
use App\Models\Transaction;
use App\Models\Product;

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
    return view('welcome');
});

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');

Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction.index');
Route::get('/transaction/create', [TransactionController::class, 'create'])->name('transaction.create');
Route::post('/transaction', [TransactionController::class, 'store'])->name('transaction.store');
Route::get('/transaction/{transaction}/edit', [TransactionController::class, 'edit'])->name('transaction.edit');
Route::put('/transaction/{transaction}/update', [TransactionController::class, 'update'])->name('transaction.update');
Route::delete('/transaction/{transaction}/destroy', [TransactionController::class, 'destroy'])->name('transaction.destroy');

Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::get('/payment/create', [PaymentController::class, 'create'])->name('payment.create');
Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');
Route::get('/payment/{payment}/edit', [PaymentController::class, 'edit'])->name('payment.edit');
Route::put('/payment/{payment}/update', [PaymentController::class, 'update'])->name('payment.update');
Route::delete('/payment/{payment}/destroy', [PaymentController::class, 'destroy'])->name('payment.destroy');

Route::get('/type', [TypeController::class, 'index'])->name('type.index');
Route::get('/type/create', [TypeController::class, 'create'])->name('type.create');
Route::post('/type', [TypeController::class, 'store'])->name('type.store');
Route::get('/type/{type}/edit', [TypeController::class, 'edit'])->name('type.edit');
Route::put('/type/{type}/update', [TypeController::class, 'update'])->name('type.update');
Route::delete('/type/{type}/destroy', [TypeController::class, 'destroy'])->name('type.destroy');