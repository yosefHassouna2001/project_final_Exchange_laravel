<?php

use App\Http\Controllers\Api\CheckTokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CityController;
use App\Http\Controllers\Api\EndPreiviousTokenController;
use App\Http\Controllers\Api\GenerateTokenController;
use App\Http\Controllers\API\UserAuthController;

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

Route::apiResource('cities' , CityController::class);

Route::prefix('auth')->group(function(){
    Route::post('register' , [UserAuthController::class , 'register']);
    Route::post('login' , [UserAuthController::class , 'login']);
    Route::post('forget' , [UserAuthController::class , 'forgetPassword']);
    Route::post('reset' , [UserAuthController::class , 'resetPassword']);
    Route::post('loginCheck' , [CheckTokenController::class , 'login']);
    Route::post('Endlogin' , [EndPreiviousTokenController::class , 'login']);
    Route::post('Generatelogin' , [GenerateTokenController::class , 'login']);

});

Route::prefix('auth')->middleware('auth:admin-api')->group(function(){

    Route::get('logout' , [UserAuthController::class , 'logout'] );
});
