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


Route::prefix('post')->group(function () {
    Route::get('list', [\App\Http\Controllers\PostController::class, 'index'])->middleware(['auth:sanctum']);
    Route::get('hightlight', [\App\Http\Controllers\PostController::class, 'hightlight'])->middleware(['auth:sanctum']);
    Route::post('add', [\App\Http\Controllers\PostController::class, 'store'])->middleware(['auth:sanctum']);
});
