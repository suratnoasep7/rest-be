<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConcertController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CheckController;

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

Route::resource('welcome', WelcomeController::class);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('concert', ConcertController::class);
    Route::resource('ticket', TicketController::class);
    Route::resource('check', CheckController::class);
    Route::put('check/{id}', [CheckController::class, 'update']);
});