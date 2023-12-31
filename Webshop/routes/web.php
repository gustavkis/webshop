<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KosarController;
use App\Http\Controllers\TermekekController;

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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::post('/termek/feltoltes/1', [TermekekController::class, 'kepFeltoltes'])->name('kepFeltoltes');

Route::post('/kep-feltoltes', [TermekController::class, 'kepFeltoltes'])->name('kepFeltoltes');



Route::delete('torol', [KosarController::class, 'torol'])->name('torol');

Route::get('show-view', [KosarController::class, 'showCartView'])->name('showCartView'); 
Route::get('/show', [KosarController::class, 'showCart'])->name('showCart');
Route::get('/welcome', [KosarController::class, 'showCartView'])->name('showCartView');
Route::get('/', [TermekekController::class, 'showProduct'])->name('showProducts');
Route::get('/add-product-to-cart/{productId}', [TermekekController::class, 'addToCart'])->name('addToCart');
Route::get('/add-to-cart/{productId}', [KosarController::class, 'addToCart'])->name('addToCart');








