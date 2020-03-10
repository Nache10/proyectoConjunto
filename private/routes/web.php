<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'WifiController@inicio');
Auth::routes();

Route::post('changepassword','WifiController@changepassword');
Route::post('resetpassword','WifiController@resetpassword');
Route::get('logout', 'WifiController@logout'); 
Route::get('admin', 'WifiController@admin')->middleware('nachoAuth');
// GRUPO DE USERS
Route::get('admin/users', 'WifiController@users')->middleware('nachoAuth');
Route::get('admin/users/create', 'WifiController@createusers')->middleware('nachoAuth');
Route::post('admin/users/createuser', 'WifiController@realcreateusers')->middleware('nachoAuth');
Route::get('admin/users/edit/{id?}', 'WifiController@editusers')->middleware('nachoAuth');
Route::get('admin/users/delete/{id?}', 'WifiController@deleteusers')->middleware('nachoAuth');
Route::post('admin/users/upload/{id?}', 'WifiController@uploadusers')->middleware('nachoAuth');
// GRUPO DE ACCESS
Route::get('admin/access', 'WifiController@access')->middleware('nachoAuth');
Route::get('admin/access/create','WifiController@accesscreate')->middleware('nachoAuth');
Route::post('admin/access/createaccess','WifiController@realaccesscreate')->middleware('nachoAuth');
Route::get('admin/access/edit/{id?}', 'WifiController@editaccess')->middleware('nachoAuth');
Route::get('admin/access/delete/{id?}', 'WifiController@deleteaccess')->middleware('nachoAuth');
Route::post('admin/access/upload/{id?}', 'WifiController@uploadaccess')->middleware('nachoAuth');
// GRUPO DE ACTIVE
Route::get('admin/active', 'WifiController@active')->middleware('nachoAuth');
Route::get('admin/active/create','WifiController@activecreate')->middleware('nachoAuth');
Route::post('admin/active/createaccess','WifiController@realactivecreate')->middleware('nachoAuth');
Route::get('admin/active/edit/{id?}', 'WifiController@editactive')->middleware('nachoAuth');
Route::get('admin/active/delete/{id?}', 'WifiController@deleteactive')->middleware('nachoAuth');
Route::post('admin/active/upload/{id?}', 'WifiController@uploadactive')->middleware('nachoAuth');
// GRUPO DE CONECTION Y BIGDATA
Route::get('admin/connection', 'WifiController@connection')->middleware('nachoAuth');
Route::get('admin/connection/delete/{id?}', 'WifiController@deleteconnection')->middleware('nachoAuth');
Route::get('admin/bigdata', 'WifiController@bigdata')->middleware('nachoAuth');
Route::get('admin/caca/delete/{id?}', 'WifiController@deletebigdata')->middleware('nachoAuth');
//GRUPO PARA LAS GRAFICAS
Route::get('admin/graphs', 'WifiController@graphs');
//Ranking
Route::get('admin/ranking', 'WifiController@ranking');

