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

Route::get('colors/change/{color}', 'App\Http\Controllers\ColorController@change');

Route::get('create-colors', 'App\Http\Controllers\ColorController@createColors');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
