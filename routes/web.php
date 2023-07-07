<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ReservesController;

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
    return view('home');
})->middleware('auth'); //solo accede a la ruta si esta autenticado

Route::get('/login', [SessionController::class, 'create'])->middleware('guest')->name('login.index');
Route::post('/login', [SessionController::class, 'store']);
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');
Route::get('/admin',[AdminController::class, 'index'])->middleware('auth.admin');
Route::post('/movies', [MoviesController::class, 'store']);
Route::get('/movies', [MoviesController::class, 'index'])->middleware('auth');
Route::get('/movies/edit/{id}', [MoviesController::class, 'show'])->middleware('auth.admin');
Route::put('/movies/{id}', [MoviesController::class, 'update']);
Route::delete('/movies/{id}', [MoviesController::class, 'destroy']);
Route::get('/reserves', [ReservesController::class, 'index'])->middleware('auth');
Route::post('/reserves/{id}/{image}/{title}/{idCategorie}/{description}/{status}', [ReservesController::class, 'store']);
Route::delete('/reserves/delete/{id}/{idMovie}', [ReservesController::class, 'destroy']);

