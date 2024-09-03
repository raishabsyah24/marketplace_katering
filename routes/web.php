<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MerchantController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SessiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;

Route::middleware(['guest'])->group(function (){ 
    Route::get('/', [SessiController::class, 'index'])->name('login');
    Route::post('/', [SessiController::class, 'login']);
});
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'create']);

Route::get('/home', function(){
    return redirect('/admin');
});


Route::middleware(['auth'])->group(function(){
    Route::get('admin', [AdminController::class, 'index']);
    Route::get('admin/merchant', [AdminController::class, 'merchant']);
    Route::get('admin/customer', [AdminController::class, 'customer']);
    Route::get('logout', [SessiController::class, 'logout']);
});





Route::resource('merchants', MerchantController::class);
Route::resource('menus', MenuController::class);
Route::resource('orders', OrderController::class);
Route::resource('invoices', InvoiceController::class);
