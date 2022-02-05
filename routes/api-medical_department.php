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


Route::prefix('medicaldepartment')->group(function () {
    Route::get('list', [\App\Http\Controllers\MedicalDepartmentController::class, 'index']);
    Route::post('create', [\App\Http\Controllers\MedicalDepartmentController::class, 'create'])->middleware(['auth:sanctum']);
});
