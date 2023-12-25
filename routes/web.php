<?php

use App\Http\Controllers\Authors\AuthorController;
use App\Http\Controllers\Books\BooksController;
use App\Http\Controllers\PeminjamanController;
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

Route::group(['prefix' => 'books'], function () {
    Route::get('/index', [BooksController::class, 'index']);
    Route::post('/save-book', [BooksController::class, 'saveBook']);
    Route::delete('/delete-book', [BooksController::class, 'deleteBook']);
});

Route::group(['prefix' => 'authors'], function () {
    Route::get('/index', [AuthorController::class, 'index']);
    Route::post('/save-authors', [AuthorController::class, 'saveAuthors']);
});

// Menampilkan daftar peminjaman
Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');

// Menampilkan form untuk menambah peminjaman baru
Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');

// Menyimpan peminjaman baru ke dalam database
Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');

// Menampilkan detail peminjaman
Route::get('/peminjaman/show/{id}', [PeminjamanController::class, 'show'])->name('peminjaman.show');

// Menampilkan form untuk mengedit peminjaman
Route::get('/peminjaman/edit/{id}', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');

// Menyimpan perubahan setelah mengedit peminjaman
Route::put('/peminjaman/update/{id}', [PeminjamanController::class, 'update'])->name('peminjaman.update');

// Menghapus peminjaman
Route::delete('/peminjaman/delete/{id}', [PeminjamanController::class, 'delete'])->name('peminjaman.delete');
