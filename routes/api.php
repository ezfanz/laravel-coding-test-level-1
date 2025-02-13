<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\EventApiController;

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

Route::group(['prefix' => 'v1'], function () {
    Route::get('/events/active-events', [EventApiController::class, 'activeEvent']);
    Route::apiResource('events', EventApiController::class)->except([
        'update'
    ]);
    Route::patch('/events/{id}', [EventApiController::class, 'edit']);
    Route::put('/events/{id}', [EventApiController::class, 'update']);
});
