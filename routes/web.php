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
    return view('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('apply','usercv')->name('cv.apply');
Route::view('application','application')->name('application');
Route::view('job/all','job.all')->name('job.all');
Route::view('job/manage','job.manage')->name('job.manage');

Route::view('manage/zone','manage.zone')->name('manage.zone');
Route::view('manage/education','manage.education')->name('manage.education');

//====================Dashboard======================================
Route::view('dashboard','dashboard')->name('dashboard');

//====================Constituency===================================
Route::get('constituency','ConstituencyController@index')->name('constituency.index');
Route::post('constituency','ConstituencyController@getConstituencyData')->name('constituency.getConstituencyData');
Route::post('constituency/getVoter','ConstituencyController@getConstituencyVoter')->name('constituency.getConstituencyVoter');

Route::get('constituency/add','ConstituencyController@add')->name('constituency.add');
Route::post('constituency/add','ConstituencyController@insert')->name('constituency.insert');
Route::get('constituency/edit/{id}','ConstituencyController@edit')->name('constituency.edit');
Route::post('constituency/update/{id}','ConstituencyController@update')->name('constituency.update');

//========================Center===============================

Route::post('center/editCenter','CenterController@editCenter')->name('center.editCenter');
Route::post('center/update/{id}','CenterController@update')->name('center.update');
Route::post('center/insert','CenterController@insert')->name('center.insert');
Route::post('center/getCenterModal','CenterController@getCenterModal')->name('center.getCenterModal');

//====================Candidates===================================
Route::get('constituency/candidates/{id}','CandidateController@index')->name('candidates.index');
Route::post('Candidates','CandidateController@getCandidate')->name('candidates.getData');
Route::get('Candidates/add','CandidateController@add')->name('candidates.add');
Route::post('Candidates/insert','CandidateController@insert')->name('candidates.insert');

Route::get('Candidates/edit/{id}','CandidateController@edit')->name('candidates.edit');
Route::get('Candidates/Edit-View/{id}','CandidateController@editForm')->name('candidates.editView');

Route::post('Candidates/update','CandidateController@update')->name('candidates.update');

Route::view('Candidates/view','candidates.view')->name('candidates.view');
Route::post('Candidates/delete','CandidateController@delete')->name('candidates.delete');

//====================Associates===================================
Route::get('Associate/add/{id}','AssociateController@add')->name('associate.add');
Route::post('Associate/insert','AssociateController@insert')->name('associate.insert');
Route::post('Associate/update','AssociateController@update')->name('associate.update');
Route::get('Associate/view/{id}','AssociateController@view')->name('associate.view');
Route::get('Associate/edit/{id}','AssociateController@edit')->name('associate.edit');
Route::post('Associate/delete','AssociateController@delete')->name('associate.delete');



//====================Promoters===================================
Route::get('Promoter/add/{id}','PromoterController@add')->name('promoter.add');
Route::post('Promoter/insert','PromoterController@insert')->name('promoter.insert');
Route::get('Promoter/edit/{id}','PromoterController@edit')->name('promoter.edit');
Route::post('Promoter/update','PromoterController@update')->name('promoter.update');

Route::get('Promoter/view/{id}','PromoterController@view')->name('promoter.view');
Route::post('Promoter/delete','PromoterController@delete')->name('promoter.delete');



//====================Settings======================================
Route::get('settings/division','DivisionController@index')->name('division.index');
Route::post('settings/division/add','DivisionController@insert')->name('division.insert');
Route::post('settings/division/edit','DivisionController@edit')->name('division.edit');
Route::post('settings/division/update/{id}','DivisionController@update')->name('division.update');




Route::get('settings/party','PartyController@index')->name('party.index');

Route::view('party/level/','partyLevel')->name('party.level');