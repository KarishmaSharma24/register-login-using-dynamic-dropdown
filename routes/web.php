<?php

use App\Http\Controllers\RegisterController;
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

Route::get('/register', [RegisterController::class,'index']);
Route::Post('/register', [RegisterController::class,'register'])->name('register');

Route::get('/login', [RegisterController::class,'loginIndex'])->name('login');
Route::post('/login', [RegisterController::class,'login']);

Route::get('/logout', [RegisterController::class,'logout']);

Route::get('/dashboard', [RegisterController::class,'dashboard'])->name('dashboard');

Route::get('/city/{id}', [RegisterController::class,'city']);
