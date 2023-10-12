<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/update/{productID}', [App\Http\Controllers\ProductController::class, 'update'])->name('update');
Route::get('/delete/{productID}', [App\Http\Controllers\ProductController::class, 'delete_product'])->name('delete');
Route::post('/add-products-action', [App\Http\Controllers\ProductController::class, 'addProducts'])->name('add-products');
