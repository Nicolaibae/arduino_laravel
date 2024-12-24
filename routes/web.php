<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserLoginController;
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
    return view('welcome');
});
Route::get('/login',[UserLoginController::class,'login'])->name('login');

Route::post('/login/user',[UserLoginController::class,'login_user'])->name('login_user');

Route::get('/logout',[UserLoginController::class,'logout'])->name('logout');
Route::get('/home',[HomeController::class,'home'])->name('home');

