<?php

Route::get('/', function () {
    return view('index');
});

Route::get('/invoices', 'InvoiceController@index');
Route::get('/invoices/{id}', 'InvoiceController@show');
Route::get('/albums', 'AlbumController@index')->name('albums');
Route::get('/albums/create', 'AlbumController@create');
Route::post('/albums', 'AlbumController@store');
Route::get('/albums/{id}/delete', 'AlbumController@deleteConfirmation');
Route::post('/albums/{id}/delete', 'AlbumController@destroy');
