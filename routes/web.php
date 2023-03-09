<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController as R;
use App\Http\Controllers\MealController as M;
use App\Http\Controllers\FrontController as F;
use App\Http\Controllers\RatingController as Rt;
use App\Http\Controllers\MenuController as Mn;


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


Route::post('/rating', [Rt::class, 'store'])->name('rate');
Route::get('/showrating', [Rt::class, 'show'])->name('rateshow');

Route::get('/', [F::class, 'home'])->name('start');
// Route::get('/hotel/{hotel}', [F::class, 'showHotel'])->name('show-hotel');
// Route::get('/cat/{country}', [F::class, 'showCatHotels'])->name('show-cats-hotels');
Route::get('/show/{menu}', [Mn::class, 'show'])->name('show')->middleware('roles:A');
Route::post('/add-to-cart', [F::class, 'addToCart'])->name('add-to-cart');
Route::get('/cart', [F::class, 'cart'])->name('cart');
Route::post('/cart', [F::class, 'updateCart'])->name('update-cart');
Route::post('/make-order', [F::class, 'makeOrder'])->name('make-order');


Route::prefix('admin/restaurants')->name('restaurants-')->group(function () {
    Route::get('/', [R::class, 'index'])->name('index')->middleware('roles:A');
    Route::get('/create', [R::class, 'create'])->name('create')->middleware('roles:A');
    Route::post('/create', [R::class, 'store'])->name('store')->middleware('roles:A');
    Route::get('/edit/{restaurant}', [R::class, 'edit'])->name('edit')->middleware('roles:A');
    Route::put('/edit/{restaurant}', [R::class, 'update'])->name('update')->middleware('roles:A');
    Route::delete('/delete/{restaurant}', [R::class, 'destroy'])->name('delete')->middleware('roles:A');
});

Route::prefix('admin/meals')->name('meals-')->group(function () {
    Route::get('/', [M::class, 'index'])->name('index')->middleware('roles:A');
    Route::get('/create', [M::class, 'create'])->name('create')->middleware('roles:A');
    Route::post('/create', [M::class, 'store'])->name('store')->middleware('roles:A');
    Route::get('/edit/{meal}', [M::class, 'edit'])->name('edit')->middleware('roles:A');
    Route::put('/edit/{meal}', [M::class, 'update'])->name('update')->middleware('roles:A');
    Route::delete('/delete/{meal}', [M::class, 'destroy'])->name('delete')->middleware('roles:A');
});

Route::prefix('admin/menus')->name('menus-')->group(function () {
    Route::get('/', [Mn::class, 'index'])->name('index')->middleware('roles:A');
    Route::get('/create', [Mn::class, 'create'])->name('create')->middleware('roles:A');
    Route::post('/create', [Mn::class, 'store'])->name('store')->middleware('roles:A');
    Route::get('/edit/{menu}', [Mn::class, 'edit'])->name('edit')->middleware('roles:A');
    Route::put('/edit/{menu}', [Mn::class, 'update'])->name('update')->middleware('roles:A');
    Route::get('/show/{menu}', [Mn::class, 'show'])->name('show');
    Route::delete('/delete/{menu}', [Mn::class, 'destroy'])->name('delete')->middleware('roles:A');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
