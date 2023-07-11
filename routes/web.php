<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MoviesData;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\TransactionController;
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
    return redirect()->route('movies');
});

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/register', function () {
    return view('login');
})->name('register');
Route::post('/register', [LoginController::class, 'register'])->name('register.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/movies', [MoviesData::class, 'show'])->name('movies');
Route::get('/movies/{id}', [MoviesData::class, 'showDetail'])->name('movies.detail');
Route::get('/movies/{id}/book', [MoviesData::class, 'bookTicket'])->name('movies.book');
Route::post('/movies/{id}/checkout', [TransactionController::class, 'checkout'])->name('movies.checkout');

Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
Route::post('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');

Route::post('/balanceTopUp', [BalanceController::class, 'topUp'])->name('topUp');
Route::post('/balanceWithDraw', [BalanceController::class, 'withDrawal'])->name('withdraw');

Route::get('/history/{name}', [TransactionController::class, 'showHistory'])->name('history');
Route::get('/history/{name}/payment-{id}', [TransactionController::class, 'historyDetail'])->name('history.detail');
Route::get('/history/{name}/payment-{id}/pay', [TransactionController::class, 'payTransaction'])->name('book.pay');
Route::get('/history/{name}/payment-{id}/cancel', [TransactionController::class, 'cancelTransaction'])->name('book.cancel');

Route::fallback(function () {
    return redirect()->route('movies');
});