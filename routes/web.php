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

Route::get('/clients', function () {
    $clients = App\Client::all();    
    return view('clients.index', compact('clients'));
})->middleware('auth');

Route::get('/clients/{client}', function ($id) {
    //$clients = App\Client::where('id', '=', $id)->get();
    $client = App\Client::find($id);
    return view('clients.show', compact('client'));
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
