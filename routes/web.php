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
Route::get('constituency/add','ConstituencyController@add')->name('constituency.add');
Route::post('constituency/add','ConstituencyController@insert')->name('constituency.insert');
Route::get('constituency/edit/{id}','ConstituencyController@edit')->name('constituency.edit');
Route::post('constituency/update/{id}','ConstituencyController@update')->name('constituency.update');

//====================Candidates===================================
Route::view('candidates','candidates.index')->name('candidates.index');
Route::view('candidates/view','candidates.view')->name('candidates.view');


//====================Settings======================================
Route::get('settings/division','DivisionController@index')->name('division.index');
Route::post('settings/division/add','DivisionController@insert')->name('division.insert');
Route::post('settings/division/edit','DivisionController@edit')->name('division.edit');
Route::post('settings/division/update/{id}','DivisionController@update')->name('division.update');




Route::get('settings/party','PartyController@index')->name('party.index');

Route::view('party/level/','partyLevel')->name('party.level');