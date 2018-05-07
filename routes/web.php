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
Auth::routes();
//\Illuminate\Support\Facades\Auth::loginUsingId(8);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('identity', 'SoldierIdentityController');
    Route::resource('formation', 'FormationController');
    Route::resource('sick-leave', 'SoldierSickLeaveController');
    Route::get('get-soldier-info', 'FormationController@getSoldierInfo');
    Route::resource('exemption', 'SoldierExemptionController');
    Route::resource('user', 'UserController');

    Route::get('/hazm-participation', 'ReportController@hazmParticipation')->name('hazm.participate');
    Route::get('/human-energy', 'ReportController@humanEnergy')->name('human.energy');
    Route::get('/eng-weapon', 'ReportController@engineer_weapon')->name('eng.weapon');
    Route::get('/identity-print/{identity}', 'SoldierIdentityController@print')->name('identity.print');
});
