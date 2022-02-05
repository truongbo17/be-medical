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


Route::prefix('likepost')->group(function () {
    Route::get('historylike', [\App\Http\Controllers\LikePostController::class, 'historyLike'])->middleware(['auth:sanctum']);
    Route::post('sendlike/{postid}', [\App\Http\Controllers\LikePostController::class, 'sendLike'])->middleware(['auth:sanctum']);
});
