<?php

use App\Http\Controllers\LogRequestController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfGeneratorController;

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

Route::get('/users', [UserController::class, 'showList'])->name('users');

Route::get('/register', [PageController::class, 'registration'])->name('register');

Route::post('/user', [UserController::class, 'store'])->name('user.store');

Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');

Route::get('/login', [PageController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('user.login');

Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');

Route::get('/user/{id}', [UserController::class, 'profile'])->name('user.profile');
Route::get('/user/edit/{id}', [UserController::class, 'editProfile'])->name('edit.profile');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('/user/{id}/download-pdf', [PdfGeneratorController::class, 'index'])->name('user.downloadPdf');

Route::get('/api/users', [UserController::class, 'apiUsers'])->name('api.users');
Route::get('/api/user/{id}', [UserController::class, 'apiUser'])->name('api.user');
Route::put('/api/user/{id}', [UserController::class, 'apiUpdate'])->name('api.user.update');
Route::post('/api/user', [UserController::class, 'apiStore'])->name('api.user.store');

Route::get('/log-request', [LogRequestController::class, 'index'])->name('log-request');