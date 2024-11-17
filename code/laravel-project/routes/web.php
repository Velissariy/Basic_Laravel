<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LogRequestController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PdfGeneratorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
    return view('main');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/users', [UserController::class, 'index'])->name('users');

Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');

//Route::get('/user/{id}', [UserController::class, 'profile'])->name('user.profile');
//Route::get('/user/edit/{id}', [UserController::class, 'editProfile'])->name('edit.profile');
//Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('/user/{id}/download-pdf', [PdfGeneratorController::class, 'index'])->name('user.downloadPdf');

Route::get('/api/users', [UserController::class, 'apiUsers'])->name('api.users');
Route::get('/api/user/{id}', [UserController::class, 'apiUser'])->name('api.user');
Route::put('/api/user/{id}', [UserController::class, 'apiUpdate'])->name('api.user.update');
Route::post('/api/user', [UserController::class, 'apiStore'])->name('api.user.store');

Route::get('/log-request', [LogRequestController::class, 'index'])->name('log-request');


Route::get('/books', [BookController::class, 'index'])->name('book');
Route::get('/books/create', [BookController::class, 'create'])->name('book.create');
Route::get('/books/{id}', [BookController::class, 'show'])->name('book.show');;
Route::put('/books/{id}', [BookController::class, 'update'])->name('book.update');;
Route::delete('/books/{id}', [BookController::class, 'delete'])->name('book.delete');
Route::get('/books', [BookController::class, 'list'])->name('book.list');
Route::post('/book', [BookController::class, 'store'])->name('book.store');


Route::get('/news', [NewsController::class, 'index'])->name('news.list');
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news', [NewsController::class, 'store'])->name('news.store');
Route::get('/news/{id}', [NewsController::class, 'show']);
Route::put('/news/{id}', [NewsController::class, 'update']);
Route::delete('/news/{id}', [NewsController::class, 'delete'])->name('news.delete');
Route::patch('/news/{id}/hidden', [NewsController::class, 'hidden'])->name('news.hidden');


require __DIR__.'/auth.php';