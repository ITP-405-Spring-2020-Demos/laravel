<?php

use App\Track;
use App\Artist;
use App\Album;
use App\Genre;
use App\Playlist;

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

Route::get('/eloquent', function() {
    // QUERYING
    // return Artist::all();
    // return Track::all();
    // return Artist::orderBy('Name')->get();
    // return Track::where('UnitPrice', '>', 0.99)->orderBy('Name')->get();

    // CREATING
    // return Genre::all();
    // $genre = new Genre();
    // $genre->Name = 'Hip Hop';
    // $genre->save();
    // return Genre::all();

    // DELETING
    // Genre::where('Name', '=', 'Hip Hop')->delete();
    // return Genre::all();

    // UPDATING
    // $genre = Genre::where('Name', '=', 'Alternative & Punk')->first();
    // $genre->Name = 'Alternative';
    // $genre->save();
    // return Genre::all();

    // RELATIONSHIPS (ONE TO MANY)
    // return Artist::find(50); // 50 = Metallica
    // return Artist::find(50)->albums;
    // return Album::find(152)->artist; // 150 = Master of Puppets

    // return Track::find(1837); // 1837 = Seek and Destroy
    // return Track::find(1837)->genre;
    // return Genre::find(3)->tracks; // 3 = Metal

    // RELATIONSHIPS (MANY TO MANY)
    // return Playlist::all();
    // return Playlist::find(17); // 17 = Heavy Metal Classic
    // return Playlist::find(17)->tracks;
    // return Track::find(1837)->playlists;

    // UPDATING A BELONGS TO RELATIONSHIP
    // $track = Track::where('Name', '=', 'Seek & Destroy')->first();
    // $track->genre()->associate(Genre::find(1));
    // $track->save();
    // return Track::where('Name', '=', 'Seek & Destroy')->first();

    // REMOVING FROM A MANY TO MANY RELATIONSHIP
    // return Playlist::find(17)->tracks; // 17 = Heavy Metal Classic
    // Playlist::find(17)->tracks()->detach(Track::find(3290));
    // return Playlist::find(17)->tracks; // 17 = Heavy Metal Classic

    // ADDING TO A MANY TO MANY RELATIONSHIP
    // Playlist::find(17)->tracks()->attach(Track::find(3290));
    // return Playlist::find(17)->tracks; // 17 = Heavy Metal Classic

    // EAGER LOADING BELONGS TO RELATIONSHIPS
    // return Track::with(['genre', 'album'])->where('UnitPrice', '>', 0.99)->orderBy('Name')->get();

    // EAGER LOADING HAS MANY RELATIONSHIPS
    // return Genre::with(['tracks'])->find(3);

    // EAGER LOADING MANY TO MANY RELATIONSHIPS
    // return Playlist::with(['tracks'])->find(17);
});
