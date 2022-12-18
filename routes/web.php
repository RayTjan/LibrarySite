<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\ComicController;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\BorrowController;

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
    return view('reader');
});

Route::get('/dashboard', function () {
    return view('reader');
})->middleware(['auth', 'verified'])->name('dashboard');

//Unique Routes
Route::get('/book/sortbooks', [\App\Http\Controllers\Admin\BookController::class,'sortbooks'])->name('book.sortbooks')->middleware('auth', 'isAdmin');
Route::get('/book/sortduedates', [\App\Http\Controllers\Admin\BookController::class,'sortduedates'])->name('book.sortduedates')->middleware('auth', 'isAdmin');
Route::get('/book/borrowlist', [\App\Http\Controllers\Admin\BookController::class,'borrowlist'])->name('book.borrowlist')->middleware('auth', 'isAdmin');
Route::put('/book/resolve/{id}',[\App\Http\Controllers\Admin\BookController::class,'resolve'])->name('book.resolve')->middleware('auth', 'isAdmin');
Route::put('/book/startborrow/{id}',[\App\Http\Controllers\Admin\BookController::class,'startborrow'])->name('book.borrow')->middleware('auth', 'isAdmin');
Route::put('/reader/book/{id}', [\App\Http\Controllers\ReaderController::class,'book'])->name('reader.book')->middleware('auth');
Route::get('/reader/booklist', [\App\Http\Controllers\ReaderController::class,'booklist'])->name('reader.booklist')->middleware('auth');


//Auth Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('book', BookController::class)->middleware('isAdmin');
    Route::resource('reader', ReaderController::class);
});

require __DIR__.'/auth.php';
