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

Route::resource('identity','SoldierIdentityController');
Route::resource('formation','FormationController');
Route::resource('sick-leave','SoldierSickLeaveController');
Route::get('get-soldier-info','FormationController@getSoldierInfo');
Route::resource('exemption','SoldierExemptionController');

Route::get('/hazm-participation','ReportController@hazmParticipation')->name('hazm.participate');
Route::get('/human-energy','ReportController@humanEnergy')->name('human.energy');
Route::get('/eng-weapon','ReportController@engineer_weapon')->name('eng.weapon');