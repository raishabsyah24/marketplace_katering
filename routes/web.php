<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MerchantController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SessiController;
use App\Http\Controllers\AdminController;

Route::middleware(['guest'])->group(function (){ 
    Route::get('/', [SessiController::class, 'index']);
    Route::post('/', [SessiController::class, 'login']);
});

Route::get('/home', function(){
    return redirect('/admin');
});


Route::get('admin', [AdminController::class, 'index']);
Route::get('logout', [SessiController::class, 'logout']);




Route::resource('merchants', MerchantController::class);
Route::resource('menus', MenuController::class);
Route::resource('orders', OrderController::class);
Route::resource('invoices', InvoiceController::class);
