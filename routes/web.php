<?php

use App\Artist;
use App\Track;
use App\Genre;
use App\Album;

// uncomment the boot method in AppServiceProvider to see SQL queries
Route::get('/eloquent', function() {
    // QUERYING
    // dd(Artist::all());
    // dd(Track::all());
    // dd(Artist::orderBy('Name')->get());
    // return Track::where('UnitPrice', '>', 0.99)
    //     ->orderBy('Name')
    //     ->get();

    // CREATING
    // return Genre::all();
    // $genre = new Genre();
    // $genre->Name = 'Hip Hop';
    // $genre->save();
    // return Genre::all();

    // DELETING
    // $genre = Genre::where('Name', '=', 'Hip Hop')->first();
    // // $genre = Genre::find(26);
    // $genre->delete();
    // return Genre::all();

    // UPDATING
    // $genre = Genre::where('Name', '=', 'Alternative & Punk')->first();
    // $genre->Name = 'Alternative';
    // $genre->save();
    // return Genre::all();

    // RELATIONSHIPS (ONE TO MANY)
    // $artist = Artist::find(50); // Metallica
    // return $artist->albums;
    // return Album::find(152)->artist; // 152 = Master of Puppets

    // return Track::find(1837); // Seek and Destroy
    // return Track::find(1837)->genre; // Metal
    // return Genre::find(3)->tracks; // 3 = Metal

    $tracks = Track::with(['genre', 'album'])
        ->where('UnitPrice', '>', 0.99)
        ->orderBy('Name')
        ->get();

    return view('eloquent', [
        'tracks' => $tracks
    ]);
});

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

Route::get('/playlists', 'PlaylistController@index');
Route::get('/playlists/{id}', 'PlaylistController@show');
