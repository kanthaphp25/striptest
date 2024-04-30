<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PaymentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[ProductsController::class,'getfiles']);
Route::post('/checkout',[PaymentController::class, 'checkout'])->name('checkout');
Route::get('/stripstatus',[PaymentController::class, 'strip_status'])->name('stripstatus');
Route::post('/payment', [PaymentController::class, 'payment'])->name('payment');
