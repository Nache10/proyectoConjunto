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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('conexionespacceso','apiController@conexionespacceso');
Route::post('connection','apiController@data');
//Ranking
Route::get('getrankingday','apiController@getrankingday');
Route::get('getrankingweek','apiController@getrankingweek');
Route::get('getrankingmonth','apiController@getrankingmonth');
Route::get('getrankingyear','apiController@getrankingyear');
Route::get('getrankingever','apiController@getrankingever');
Route::get('rankingchart','apiController@rankingchart');
Route::get('markers','apiController@markers');
//graficas
Route::post('access1','apiController@access1');