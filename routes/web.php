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

Auth::routes();

Route::get('/home', 'EventController@index')->name('home');

Route::get('detail/{id}', 'EventController@showDetail');

Route::post('detail/{id}', 'EventController@join');

Route::get('/set_event', 'EventController@show')->name('setEvent.show');
Route::post('/set_event', 'EventController@post')->name('setEvent.post');

Route::get('/set_event/confirm', 'EventController@confirm')->name('setEvent.confirm');
Route::post('/set_event/confirm', 'EventController@send')->name('setEvent.send');

Route::get('/set_event/complete', 'EventController@complete')->name('setEvent.complete');


// Route::get('/{any}', function(){
//     return view('App');
// })->where('any', '.*');

Route::middleware('auth')->post('/mylist', 'EventController@add')->name('add');

Route::middleware('auth')->get('/mylist', 'MylistController@index');
