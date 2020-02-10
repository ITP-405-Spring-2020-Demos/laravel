<?php

Route::get('/', function () {
    return view('index');
});

Route::get('/invoices', 'InvoiceController@index');
Route::get('/invoices/{id}', 'InvoiceController@show');
Route::get('/albums', 'AlbumController@index');
Route::get('/albums/create', 'AlbumController@create');
Route::post('/albums', 'AlbumController@store');
