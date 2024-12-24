<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Esp32GetController;
use App\Http\Controllers\Esp32SendController;
use App\Http\Controllers\Esp32ReceiveController;
use App\Http\Controllers\HomeController;

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



Route::get('/esp32/send_data_iot', [HomeController::class, 'get_data_iot']);
Route::post('/esp32/send_data_iot2', [HomeController::class, 'handleApi'])->name('test.callApi');


// Route::post('/fetch-and-store', [DistanceController::class, 'fetchAndStoreData']);
// Route::get('/fetch-and-store', [DistanceController::class, 'fetchAndStoreData']);
