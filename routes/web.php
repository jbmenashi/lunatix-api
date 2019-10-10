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

Route::get('/', function () {
    return view('welcome');
});

Route::get('json-api/performers', 'ApiController@performers');
Route::get('json-api/tickets', 'ApiController@tickets');
Route::get('json-api/ticket_groups', 'ApiController@ticket_groups');
