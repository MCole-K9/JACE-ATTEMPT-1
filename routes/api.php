<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\InfractionController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Models\Infraction;
use Codedge\Fpdf\Fpdf\Fpdf;

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

// Get Activity Logs
Route::middleware('auth:sanctum')->get('/logs/download', [AdminController::class, 'getActivityLogs']);

// Get Infraction Reports
Route::middleware('auth:sanctum')->post('/infractions/report', [AdminController::class, 'getInfractionReport']);

// Technically this should go inside of user or something, but wtv
Route::middleware('auth:sanctum')->get('/csrf', function (){
    $user = auth()->user();

    if ($user){
        return response(csrf_token(), 200, ['Content-Type' => 'text/plain']);
    }
    else {
        return response('', 401);
    }
});