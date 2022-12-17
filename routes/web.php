<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\ReaderController;

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
Route::post('librarian/catalog', [\App\Http\Controllers\LibrarianController::class,'index'])->name('librarian.catalog');
Route::post('librarian/userlist', [\App\Http\Controllers\LibrarianController::class,'userlist'])->name('librarian.userlist');
Route::resource('librarian', LibrarianController::class);



Route::resource('reader', ReaderController::class);
Route::get('reader/borrowedbooks', [\App\Http\Controllers\ReaderController::class,'borrow'])->name('reader.borrowedbooks');
Route::put('reader/updatebook', [\App\Http\Controllers\ReaderController::class,'updateBook'])->name('reader.updatebook');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
