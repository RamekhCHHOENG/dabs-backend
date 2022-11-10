<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\AppointmentController;

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

// Route::middleware('auth:api')->get('v1/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api')->group(function (){
    Route::get('v1/user', function (Request $request) {
        return $request->user();
    });
    Route::post('v1/logout', [
        AuthController::class, 'logout'
    ]);
});
Route::resource('services', ServiceController::class);
Route::resource('appointments', AppointmentController::class);

Route::post('/v1/register', [AuthController::class, 'register']);
Route::post('/v1/login', [AuthController::class, 'login']);
// Route::get('/v1/logout', [AuthController::class, 'logout']);
// Route::middleware('auth:api')->group(function () {
//     Route::resource('users', UserController::class);
// });

