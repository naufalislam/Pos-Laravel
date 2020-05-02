<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('register', 'Api\RegisterController@action');
Route::post('login', 'Api\LoginController@action');
// Route::get('me', 'Api\UserController@me')->middleware('auth:api');


Route::group(['middleware' => 'auth:api'], function() {
    Route::get('me', 'Api\UserController@me');
});