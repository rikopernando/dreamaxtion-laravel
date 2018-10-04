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

Route::middleware('auth:api','throttle:10,5')->group(function(){

    Route::get('/user', function(Request $request) {
        return $request->user();
    });

    Route::get('/', function(){
          return response()->json([
             'message' => 'Welcome To GitHub Jobs API' 
          ],200);        
    });

    Route::get('jobs', 'JobsController@index');

    Route::get('jobs/search', 'JobsController@search');

});
