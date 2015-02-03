<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'IndexController@getDashboard');

Route::get('/reports/compare-stations/{firstStationId}/{secondStationId}', [
	'uses' => 'CompareStationController@getReport',
	'as' => 'reports.compare-stations'
])->where([
	'firstStationId' => '\d+',
	'secondStationId' => '\d+'
]);

Route::get('/stations/add', [
	'uses' => 'StationsController@getAddStation',
	'as' => 'stations.add'
]);

Route::post('/stations/add', [
	'uses' => 'StationsController@postAddStation',
	'as' => 'stations.store'
]);

Route::get('/stations/{stationId}', [
	'uses' => 'StationsController@getViewStation',
	'as' => 'stations.view'
]);