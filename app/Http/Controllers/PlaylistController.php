<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = DB::table('playlists')->get();

        return view('playlist.index', [
            'playlists' => $playlists
        ]);
    }

    public function show($id)
    {
        $tracks = DB::table('playlist_track')
            ->select(
                'tracks.Name as TrackName',
                'albums.Title as AlbumTitle',
                'artists.Name as ArtistName',
                'genres.Name as GenreName',
                'media_types.Name as MediaTypeName'
            )
            ->join('tracks', 'playlist_track.TrackId', '=', 'tracks.TrackId')
            ->join('albums', 'tracks.AlbumId', '=', 'albums.AlbumId')
            ->join('artists', 'albums.ArtistId', '=', 'artists.ArtistId')
            ->join('genres', 'tracks.GenreId', '=', 'genres.GenreId')
            ->join('media_types', 'tracks.MediaTypeId', 'media_types.MediaTypeId')
            ->where('PlaylistId', '=', $id)
            ->get();

        $playlist = DB::table('playlists')
            ->where('PlaylistId', '=', $id)
            ->first();

        return view('playlist.show', [
            'playlist' => $playlist,
            'tracks' => $tracks
        ]);
    }
}
