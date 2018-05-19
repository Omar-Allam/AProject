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

    Route::post('identity/search','SoldierIdentityController@search')->name('identify.search');
    Route::resource('identity', 'SoldierIdentityController');
    Route::post('formation/search','FormationController@search')->name('formation.search');
    Route::resource('formation', 'FormationController');
    Route::resource('sick-leave', 'SoldierSickLeaveController');
    Route::post('sick-leave/search','SoldierSickLeaveController@search')->name('sick-leave.search');
    Route::get('get-soldier-info', 'FormationController@getSoldierInfo');
    Route::resource('exemption', 'SoldierExemptionController');
    Route::post('exemption/search','SoldierExemptionController@search')->name('exemption.search');

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

    Route::get('hazm-soldiers/displayHazm', 'HazmSoldiersController@displayHazm')->name('hazm-soldiers.displayHazm');
    Route::get('hazm-soldiers/index', 'HazmSoldiersController@displayAll')->name('hazm-soldiers.displayAll');
    Route::get('hazm-soldiers/print', 'HazmSoldiersController@print')->name('hazm-soldiers.print');
    Route::post('hazm-soldiers/updateHazm', 'HazmSoldiersController@updateHazm')->name('hazm-soldiers.updateHazm');

    Route::get('martyrdom-soldiers/displayMart', 'MartydomController@displayMartydom')->name('martyrdom-soldiers.displayMartydom');
    Route::get('martyrdom-soldiers/index', 'MartydomController@displayAll')->name('martyrdom-soldiers.displayAll');
    Route::get('martyrdom-soldiers/print', 'MartydomController@print')->name('martyrdom-soldiers.print');
    Route::post('martyrdom-soldiers/updateMartydom', 'MartydomController@updateMartydom')->name('martyrdom-soldiers.updateMartydom');
    Route::delete('martyrdom-soldiers/{soldier}', 'MartydomController@delete')->name('martyrdom-soldiers.delete');


    Route::get('injury-soldiers/displayInjury', 'InjurySoldierController@displayInjury')->name('injury-soldiers.displayInjury');
    Route::get('injury-soldiers/index', 'InjurySoldierController@displayAll')->name('injury-soldiers.displayAll');
    Route::get('injury-soldiers/print', 'InjurySoldierController@print')->name('injury-soldiers.print');
    Route::post('injury-soldiers/updateInjury', 'InjurySoldierController@updateInjury')->name('injury-soldiers.updateInjury');
    Route::delete('injury-soldiers/{soldier}', 'InjurySoldierController@delete')->name('injury-soldiers.delete');


    Route::get('enroll-soldiers/displayEnroll', 'EnrolledSoldierController@displayEnroll')->name('enroll-soldiers.displayEnroll');
    Route::get('enroll-soldiers/index', 'EnrolledSoldierController@displayAll')->name('enroll-soldiers.displayAll');
    Route::get('enroll-soldiers/print', 'EnrolledSoldierController@print')->name('enroll-soldiers.print');
    Route::post('enroll-soldiers/updateEnroll', 'EnrolledSoldierController@updateEnroll')->name('enroll-soldiers.updateEnroll');
    Route::delete('enroll-soldiers/{soldier}', 'EnrolledSoldierController@delete')->name('enroll-soldiers.delete');


    Route::get('suspend-soldiers/displaySuspend', 'SuspendSalarySoldierController@displaySuspend')->name('suspend-soldiers.displaySuspend');
    Route::get('suspend-soldiers/index', 'SuspendSalarySoldierController@displayAll')->name('suspend-soldiers.displayAll');
    Route::get('suspend-soldiers/print', 'SuspendSalarySoldierController@print')->name('suspend-soldiers.print');
    Route::post('suspend-soldiers/updateSuspend', 'SuspendSalarySoldierController@updateSuspend')->name('suspend-soldiers.updateSuspend');
    Route::delete('suspend-soldiers/{soldier}', 'SuspendSalarySoldierController@delete')->name('suspend-soldiers.delete');


    Route::get('proceed-soldiers/displaySuspend', 'ProceedWorkController@displayProceed')->name('proceed-soldiers.displayProceed');
    Route::get('proceed-soldiers/index', 'ProceedWorkController@displayAll')->name('proceed-soldiers.displayAll');
    Route::get('proceed-soldiers/print', 'ProceedWorkController@print')->name('proceed-soldiers.print');
    Route::post('proceed-soldiers/updateProceeed', 'ProceedWorkController@updateProceed')->name('proceed-soldiers.updateProceed');
    Route::delete('proceed-soldiers/{soldier}', 'ProceedWorkController@delete')->name('proceed-soldiers.delete');

});
