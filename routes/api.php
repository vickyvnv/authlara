<?php

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

Route::post('/auth/register', 'App\Http\Controllers\AuthController@postRegister');
Route::post('/auth/login', 'App\Http\Controllers\AuthController@postLogin');

Route::group(['middleware' => ['auth.jwt']], function () {

    Route::get('/auth/logout', 'App\Http\Controllers\AuthController@logout');
});
