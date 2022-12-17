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
Route::get('/librarian/catalog', [\App\Http\Controllers\LibrarianController::class,'catalog'])->name('librarian.catalog');
Route::get('/librarian/borrowlist', [\App\Http\Controllers\LibrarianController::class,'borrowlist'])->name('librarian.borrowlist');
Route::put('/librarian/updatebook', [\App\Http\Controllers\LibrarianController::class,'updatebookstatus'])->name('librarian.updatebook');
Route::resource('librarian', LibrarianController::class);
Route::resource('borrow', BorrowController::class);



Route::resource('reader', ReaderController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
