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
    return view('auth.login');
});

Auth::routes();
Route::get('/getDataFromApi', 'PrescriptionController@getDataFromApi')->name('getDataFromApi');

Route::group(['middleware' => 'auth'], function () {
  Route::get('/home', 'PrescriptionController@index')->name('home');
  Route::get('/add', 'PrescriptionController@add')->name('add');
  Route::post('/insert', 'PrescriptionController@store')->name('insert');
  Route::get('/edit/{id}', 'PrescriptionController@edit')->name('edit');
  Route::post('/update/{id}', 'PrescriptionController@update')->name('update');
  Route::get('/delete/{id}', 'PrescriptionController@delete')->name('delete');
  Route::get('/report', 'PrescriptionController@report')->name('report');
  Route::get('/all', 'PrescriptionController@all')->name('all');
});
