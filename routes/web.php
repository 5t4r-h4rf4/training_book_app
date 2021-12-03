<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');

    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    //UNTUK INSERT DATA MENGGUNAKAN POST
    Route::post('/post', [CategoryController::class, 'store'])->name('category.store');
    //UNTUK MENANGKAP DATA ID
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    //UNTUK UPDATE MENGGUNAKAN PUT
    Route::put('/{id}}', [CategoryController::class, 'update'])->name('category.update');
    // UNTUK DELETE DATA
    Route::delete('/{id}}', [CategoryController::class, 'destroy'])->name('category.delete');
    // SELECT PADA CREATE BOOK
    Route::get('/all', [CategoryController::class, 'getAllCategory'])->name('category.all');
});

Route::resource('book', BookController::class);
