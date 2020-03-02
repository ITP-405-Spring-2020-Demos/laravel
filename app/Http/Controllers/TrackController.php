<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = DB::table('tracks')
            ->select('tracks.TrackId', 'tracks.Name as TrackName', 'albums.Title as AlbumTitle', 'artists.Name as ArtistName')
            ->join('albums', 'tracks.AlbumId', '=', 'albums.AlbumId')
            ->join('artists', 'albums.ArtistId', '=', 'artists.ArtistId')
            ->orderBy('ArtistName')
            ->orderBy('AlbumTitle')
            ->orderBy('TrackName')
            ->get();

        return view('track.index', [
            'tracks' => $tracks
        ]);
    }

    public function showAddToPlaylistForm($id)
    {
        return view('track.add-to-playlist', [
            'trackId' => $id,
            'playlists' => DB::table('playlists')->orderBy('Name')->get()
        ]);
    }

    public function addToPlaylist($id, Request $request)
    {
        $request->validate([
            'playlist' => 'required|exists:playlists,PlaylistId'
        ]);

        DB::table('playlist_track')->insert([
            'PlaylistId' => $request->input('playlist'),
            'TrackId' => $id
        ]);

        $track = DB::table('tracks')->where('TrackId', '=', $id)->first();
        $playlist = DB::table('playlists')
            ->where('PlaylistId', '=', $request->input('playlist'))
            ->first();

        return redirect()
            ->route('playlist', [
                'id' => $request->input('playlist')
            ])
            ->with(
                'success',
                "{$track->Name} was successfully added to {$playlist->Name}"
            );
    }
}
