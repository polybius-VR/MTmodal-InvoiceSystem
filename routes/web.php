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

Route::get('about', function () {
    return view('about');
});

//Route::get('clients', 'ClientController@index')->middleware('auth');

//Route::get('clients/{client}', 'ClientController@show')->middleware('auth');

Route::resource('clients', 'ClientController')->middleware('auth');

Route::resource('currencies', 'CurrencyController')->middleware('auth');

Route::resource('receivableInvoices', 'ReceivableInvoiceController')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
