<?php

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

Route::view('/', 'homepage')->name('show.home');
Route::view('/testform', 'testform')->name('show.testform');
Route::view('/login', 'login')->name('show.login');

Route::get('/account', [App\Http\Controllers\BalanceController::class, 'showAccount'])->name('show.account');
Route::post('/withdraw', [App\Http\Controllers\BalanceController::class, 'withdraw'])->name('user.withdraw');
Route::post('/add', [App\Http\Controllers\BalanceController::class, 'addBalance'])->name('user.add');
Route::post('/add-balance-account', [App\Http\Controllers\BalanceController::class, 'addBalanceAccount'])->name('add.balance.account');

Route::post('/register', [App\Http\Controllers\AuthenticationController::class, 'create'])->name('user.create');
Route::post('/custom-login', [App\Http\Controllers\AuthenticationController::class, 'customLogin'])->name('user.login');
Route::get('/logout', [App\Http\Controllers\AuthenticationController::class, 'logout'])->name('user.logout');
