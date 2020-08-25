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

Route::group(['prefix' => 'v1', 'namespace' => 'Api\v1'], function() {
	Route::post('login', 'AuthController@login');
	
	Route::group(['middleware' => 'auth:api'], function() {
		Route::get('logout', 'AuthController@logout');

		Route::apiResource('schools', 'SchoolController');

		
		Route::get('reports/{school_id}', 'ReportController@collect');
		
		Route::get('reports', 'ReportController@index');
		Route::get('reports/{school_id}/pdf', 'ReportController@getPdf');
	});
});