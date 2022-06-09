<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function() {
        Route::resource('dashboard', 'UserController');
        Route::resource('dishes', 'DishController');
        Route::resource('orders', 'OrderController');
});

// rotte stripe 
Route::get('checkout','CheckoutController@checkout');
Route::post('checkout','CheckoutController@afterpayment')->name('checkout.credit-card');

// rotte di vue
Route::fallback(function () {
    return view('home');
});
