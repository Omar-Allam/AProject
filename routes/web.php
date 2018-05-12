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
    Route::get('/all_identity-print/', 'SoldierIdentityController@printAll')->name('identity-all.print');
    Route::get('/formation-print/{formation}', 'FormationController@print')->name('formation.print');
    Route::get('/sick-leave-print', 'SoldierSickLeaveController@print')->name('sickleave.print');
    Route::get('/leave-print/{sickLeaf}', 'SoldierSickLeaveController@printSingle')->name('sleave.print');
    Route::get('/medical-exemption', 'SoldierExemptionController@print')->name('exemption.print');
    Route::get('/medical-exemption/{exemption}', 'SoldierExemptionController@printSingle')->name('sexemption.print');
    Route::get('/hazm-participation/print', 'ReportController@printHazm')->name('hazm.print');
    Route::get('/human-energy/print', 'ReportController@printEnergy')->name('human-energy.print');
    Route::get('/eng-weapon/print', 'ReportController@printWeapon')->name('eng-weapon.print');
    Route::get('/backup', 'HomeController@backup')->name('system.backup');

    Route::get('hazm-soldiers/displayHazm','HazmSoldiersController@displayHazm')->name('hazm-soldiers.displayHazm');
    Route::get('hazm-soldiers/index','HazmSoldiersController@displayAll')->name('hazm-soldiers.displayAll');
    Route::get('hazm-soldiers/print','HazmSoldiersController@print')->name('hazm-soldiers.print');
    Route::post('hazm-soldiers/updateHazm','HazmSoldiersController@updateHazm')->name('hazm-soldiers.updateHazm');

    Route::get('martyrdom-soldiers/displayHazm','MartydomController@displayMartydom')->name('martyrdom-soldiers.displayMartydom');
    Route::get('martyrdom-soldiers/index','MartydomController@displayAll')->name('martyrdom-soldiers.displayAll');
    Route::get('martyrdom-soldiers/print','MartydomController@print')->name('martyrdom-soldiers.print');
    Route::post('martyrdom-soldiers/updateMartydom','MartydomController@updateMartydom')->name('martyrdom-soldiers.updateMartydom');
    Route::delete('martyrdom-soldiers/{soldier}','MartydomController@delete')->name('martyrdom-soldiers.delete');
//    Route::resource('hazm-soldiers', 'HazmSoldiersController');

});
