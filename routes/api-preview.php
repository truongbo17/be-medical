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


Route::prefix('preview')->group(function () {
    Route::get('list', [\App\Http\Controllers\PreviewController::class, 'index'])->middleware(['auth:sanctum']);
});
