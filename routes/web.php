<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return redirect('/books');
});

Route::get('/books', [BookController::class, 'index'])->name('books.index');
