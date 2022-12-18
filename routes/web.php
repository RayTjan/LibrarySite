<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibrarianController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/librarian/catalog', [\App\Http\Controllers\LibrarianController::class,'catalog'])->name('librarian.catalog')->middleware('auth', 'isAdmin');
Route::get('/librarian/borrowlist', [\App\Http\Controllers\LibrarianController::class,'borrowlist'])->name('librarian.borrowlist')->middleware('auth', 'isAdmin');
Route::put('/librarian/resolve/{id}',[\App\Http\Controllers\LibrarianController::class,'resolve'])->name('librarian.resolve')->middleware('auth', 'isAdmin');
Route::put('/librarian/startborrow/{id}',[\App\Http\Controllers\LibrarianController::class,'startborrow'])->name('librarian.borrow')->middleware('auth', 'isAdmin');
Route::put('/reader/book/{id}', [\App\Http\Controllers\ReaderController::class,'book'])->name('reader.book')->middleware('auth');
Route::get('/reader/booklist', [\App\Http\Controllers\ReaderController::class,'booklist'])->name('reader.booklist')->middleware('auth');

Route::resource('reader', ReaderController::class)->middleware('auth');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('librarian', LibrarianController::class)->middleware('isAdmin');
    Route::resource('borrow', BorrowController::class)->middleware('isAdmin');
});

require __DIR__.'/auth.php';
