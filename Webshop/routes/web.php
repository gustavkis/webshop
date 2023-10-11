<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('kosar');
});



Route::get('/', [TermekekController::class, 'showProduct'])->name('showProducts');
//Route::get('/', [TermekekController::class, 'showKosar'])->name('showKosar');
Route::get('/add-to-cart/{productId}', [TermekekController::class, 'addToCart'])->name('addToCart');




