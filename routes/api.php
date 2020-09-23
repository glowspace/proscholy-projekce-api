<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\SessionSongController;
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

// Sessions API
Route::apiResource('sessions', SessionController::class);
Route::apiResource('sessions/songs', SessionSongController::class);
