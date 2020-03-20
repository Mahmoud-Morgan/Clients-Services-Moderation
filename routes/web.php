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

Route::get('/','ClientController@index');

 Route::resource('/servicename','ServicesNamesController');   
 Route::resource('/client','ClientController'); 
 Route::resource('/clientservises','ClientServiceController'); 

 Route::get('/clientservises2/edit/{id1}/{id2}','ClientServiceController@edit')->name('clientservises2.edit');
 Route::PATCH('/clientservises2/update/{id1}/{id2}','ClientServiceController@update')->name('clientservises2.update');
  Route::get('/clientservises2/create/{id}/','ClientServiceController@create')->name('clientservises2.create');
 Route::DELETE('/clientservises2/delete/{id1}/{id2}','ClientServiceController@destroy')->name('clientservises2.destroy');
 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
