<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Esp32GetController;
use App\Http\Controllers\Esp32SendController;
use App\Http\Controllers\Esp32ReceiveController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// use App\Http\Controllers\Esp32Controller;



Route::post('/esp32/receive', [Esp32GetController::class, 'receiveData'])->name("receive.esp");
Route::post('/esp32/send', [Esp32SendController::class, 'sendData'])->name("send.esp");

