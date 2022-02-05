<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::prefix('order')->group(function () {
    Route::post('add', [\App\Http\Controllers\OrderController::class, 'store'])->middleware(['auth:sanctum']);
    Route::get('history', [\App\Http\Controllers\OrderController::class, 'index'])->middleware(['auth:sanctum']);
});
