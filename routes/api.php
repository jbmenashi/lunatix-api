<?php

use Illuminate\Http\Request;
use App\Performer;
use App\Ticket;
use App\TicketGroup;

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


Route::get('performers', 'PerformerController@index');
Route::get('performers/{id}', 'PerformerController@show');
Route::get('performers_csv', 'PerformerController@csv');
Route::post('performers', 'PerformerController@store');
Route::get('tickets', 'TicketController@index');
Route::get('tickets/{id}', 'TicketController@show');
Route::get('ticket_groups', 'TicketGroupController@index');
Route::get('ticket_groups/{id}', 'TicketGroupController@show');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
