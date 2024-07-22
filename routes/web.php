<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\BorrowersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('books/borrowers', [BorrowersController::class, 'index'])->name('borrowers.index');
Route::post('books/borrowers', [BorrowersController::class, 'store'])->name('borrowers.store');

Route::put('books/toggle-read', [BooksController::class, 'toggleRead']);
Route::resource('books', BooksController::class);