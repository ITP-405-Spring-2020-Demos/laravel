<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = DB::table('albums')
            ->select('albums.Title', 'artists.Name as ArtistName')
            ->join('artists', 'albums.ArtistId', '=', 'artists.ArtistId')
            ->orderBy('ArtistName')
            ->orderBy('Title')
            ->get();

        return view('album.index', [
            'albums' => $albums
        ]);
    }
}
