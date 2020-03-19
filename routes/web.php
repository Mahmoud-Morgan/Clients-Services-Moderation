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
Route::get('/create', function () {
    return view('clients.create');
});

 Route::resource('/servicename','ServicesNamesController');   
 Route::resource('/client','ClientController'); 
 Route::resource('/clientservises','ClientServiceController'); 

 Route::get('/clientservises2/edit/{id1}/{id2}','ClientServiceController@edit')->name('clientservises2.edit');
 Route::PATCH('/clientservises2/update/{id1}/{id2}','ClientServiceController@update')->name('clientservises2.update');
 Route::get('/clientservises2/create/{id1}','ClientServiceController@create')->name('clientservises2.create');
 