<?php

Route::get('/', function () {
        return view('auth/login');
});

Auth::routes();

Route::get('/home', 'EventController@index')->name('home');

Route::get('detail/{id}', 'EventController@showDetail');

Route::post('detail/{id}', 'EventController@join');

Route::get('detail/delete/{id}', 'EventController@showDetailDelete');

// Route::middleware('auth')->get('/home', 'EventController@index')->name('home');

// Route::get('detail/{id}', 'EventController@showDetail');

// Route::post('detail/{id}', 'EventController@join');
// Route::post('join/{event}', 'EventController@joinEvent')->name('joinEvent');
// Route::middleware('auth')->post('join/delete/{event}', 'EventController@delete2')->name('delete2');

// Route::get('/set_event', 'EventController@show')->name('setEvent.show');
// Route::post('/set_event', 'EventController@post')->name('setEvent.post');

// Route::get('/set_event/confirm', 'EventController@confirm')->name('setEvent.confirm');
// Route::post('/set_event/confirm', 'EventController@send')->name('setEvent.send');

// Route::get('/set_event/complete', 'EventController@complete')->name('setEvent.complete');


// Route::get('/{any}', function(){
//     return view('App');
// })->where('any', '.*');

// Route::middleware('auth')->post('/mylist/{event}', 'EventController@add')->name('add');
// Route::middleware('auth')->post('/mylist/delete/{event}', 'EventController@delete')->name('delete');

// Route::middleware('auth')->get('/mylist', 'MylistController@index');

// Route::middleware('auth')->get('/profile', 'UserController@edit');
// Route::middleware('auth')->post('/profile', 'UserController@update')->name('update');

// Route::get('/myevent', 'MyEventController@index')->name('myevent');

// Route::middleware('auth')->post('/myevent/delete/{event}', 'EventController@delete')->name('eventDelete');

// Route::get('/created_event', 'MyEventController@created')->name('created');

// Route::middleware('auth')->post('/created_event/delete/{event}', 'EventController@createdDelete')->name('createdDelete');

Route::group(['middleware' => ['auth']], function() {
    // Route::get('/home', 'EventController@index')->name('home');
    Route::post('/mylist/{event}', 'EventController@add')->name('add');
    Route::post('/mylist/delete/{event}', 'EventController@delete')->name('delete');
    Route::get('/mylist', 'MylistController@index');
    Route::get('/profile', 'UserController@edit');
    Route::post('/profile', 'UserController@update')->name('update');
    Route::post('/myevent/delete/{event}', 'EventController@delete')->name('eventDelete');
    Route::get('/myevent', 'MyEventController@index')->name('myevent');
    Route::post('/myevent/delete/{event}', 'EventController@delete')->name('eventDelete');
    Route::post('/created_event/delete/{event}', 'EventController@createdDelete')->name('createdDelete');
    Route::get('/created_event', 'MyEventController@created')->name('created');

    Route::post('/detail/delete/{event}', 'EventController@createdDelete2')->name('createdDelete2');

    Route::post('join/{event}', 'EventController@joinEvent')->name('joinEvent');
    Route::post('join/delete/{event}', 'EventController@delete2')->name('delete2');

    Route::get('/set_event', 'EventController@show')->name('setEvent.show');
    Route::post('/set_event', 'EventController@post')->name('setEvent.post');

    Route::get('/set_event/confirm', 'EventController@confirm')->name('setEvent.confirm');
    Route::post('/set_event/confirm', 'EventController@send')->name('setEvent.send');

    Route::get('/set_event/complete', 'EventController@complete')->name('setEvent.complete');
});