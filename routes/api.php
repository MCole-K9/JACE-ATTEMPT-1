<?php

use App\Http\Controllers\InfractionController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Infractions API endpoints. Reminder to self: Put the plaintext API token in the Bearer Auth part
Route::apiResource('/infractions', InfractionController::class)->middleware('auth:sanctum');