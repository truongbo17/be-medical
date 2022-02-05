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


Route::prefix('schedule')->group(function () {
    Route::post('add', [\App\Http\Controllers\ScheduleController::class, 'store'])->middleware(['auth:sanctum']);
    Route::get('list', [\App\Http\Controllers\ScheduleController::class, 'index'])->middleware(['auth:sanctum']);
});
