<?php

use App\Http\Controllers\Api\AuthController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);
Route::post('refresh',[AuthController::class, 'refresh']);


Route::group(['middleware' => ['auth:api','jwt.refresh']], function() {
    Route::get('users', function() {
        return \App\Models\User::all();
    });

    Route::post('logout',[AuthController::class, 'logout']);

});
