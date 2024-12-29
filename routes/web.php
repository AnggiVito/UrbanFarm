<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\GrowplanController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.register');
});

Route::get('/register', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/register', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/login', [CustomerController::class, 'loginform'])->name('login');
Route::post('/login', [CustomerController::class, 'login']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/product', [ProductController::class, 'index'])->name('product.index');

Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');

Route::get('/community', [ChatController::class, 'index'])->name('chat.index');

Route::get('/growplan', [GrowplanController::class, 'index'])->name('growplan.index');

Route::get('/video', [VideoController::class, 'index'])->name('video.index');

Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('customers', [CustomerController::class, 'store'])->name('customers.store');
Route::get('customers/{id}', [CustomerController::class, 'show'])->name('customers.show');
Route::get('customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('customers/{id}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');

Route::post('logout', [CustomerController::class, 'destroy'])->name('logout');