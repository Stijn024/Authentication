<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\BorrowersController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('books/borrowers', [BorrowersController::class, 'index'])->name('borrowers.index');
Route::post('books/borrowers', [BorrowersController::class, 'store'])->name('borrowers.store');

Route::put('books/toggle-read', [BooksController::class, 'toggleRead']);
Route::resource('books', BooksController::class);