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

Route::get('/','reservationController@home');

Route::get('/en', 'reservationController@english');

Route::resource('/reservations', 'reservationController');
Route::get('/addOption/{id}', 'FormuleController@addOption');
Route::post('/addOption{id}', 'FormuleController@storeOption');
Route::get('/cadeau/{formule}', ['uses' => 'reservationController@cadeau']);
Route::get('/en/cadeau/{formule}', ['uses' => 'reservationController@cadeauAng']);
Route::get('/en/reservations', 'reservationController@listEng');
Route::get('/reservation/{formule}', ['uses'=>'reservationController@show']);
Route::get('/en/reservations/{formule}', ['uses'=>'reservationController@formEng']);
Route::get('/api', ['uses'=>'reservationController@api']);
Route::get('/done/{code}/{form}', ['uses'=>'reservationController@getDone']);
Route::get('/cancel/{code}/{form}', ['uses'=>'reservationController@getCancel']);
Route::post('/getcheckout', ['uses'=>'reservationController@getCheckout']);
Route::post('/cadeauGetCheckout', ['uses'=>'reservationController@cadeauGetCheckout']);
Route::post('/modifieroptions/{id}', ['uses' => 'FormuleController@update_option']);
Route::get('/details', ['uses'=>'reservationController@details']);
Route::get('/recherche', ['uses'=>'HomeController@recherche', 'as' => 'recherche']);
Route::get('/boncadeau', ['uses'=>'cadeauController@index']);
Route::auth();
Route::resource('/admin', 'HomeController');
Route::resource('/formules', 'FormuleController');
Route::resource('/agenda', 'agendaController');
Route::resource('/boncadeau', 'cadeauController');
Route::get('/monsejour', ['uses'=>'reservationController@codeForm']);
Route::post('/monsejour/reserver', ['uses'=>'reservationController@checkCode']);
Route::post('/monsejour/reservation', ['uses'=>'reservationController@cadeauRes']);
Route::get('/en/monsejour', ['uses'=>'reservationController@ang_codeForm']);
Route::post('/en/monsejour/reserver', ['uses'=>'reservationController@ang_checkCode']);
Route::post('/en/monsejour/reservation', ['uses'=>'reservationController@ang_cadeauRes']);