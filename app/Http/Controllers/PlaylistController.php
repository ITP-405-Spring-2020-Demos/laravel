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

    public function create()
    {
        return view('playlist.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30'
        ]);

        DB::table('playlists')->insert([
            'name' => $request->input('name')
        ]);

        return redirect()
            ->route('playlists')
            ->with(
                'success',
                "Playlist {$request->input('name')} was created successfully"
            );
    }

    public function edit($id)
    {
        $playlist = DB::table('playlists')
            ->where('PlaylistId', '=', $id)
            ->first();

        return view('playlist.edit', [
            'playlist' => $playlist
        ]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|max:30'
        ]);

        $oldPlaylist = DB::table('playlists')->where('PlaylistId', '=', $id)->first();

        DB::table('playlists')
            ->where('PlaylistId', '=', $id)
            ->update([
                'Name' => $request->input('name')
            ]);

        return redirect()
            ->route('playlists')
            ->with(
                'success',
                "{$oldPlaylist->Name} was successfully renamed to {$request->input('name')}"
            );
    }

    public function showDeleteConfirmation($id)
    {
        $playlist = DB::table('playlists')->where('PlaylistId', '=', $id)->first();

        return view('playlist.delete-confirmation', [
            'playlist' => $playlist
        ]);
    }

    public function delete($id)
    {
        $playlist = DB::table('playlists')->where('PlaylistId', '=', $id)->first();

        DB::table('playlist_track')->where('PlaylistId', '=', $id)->delete();
        DB::table('playlists')->where('PlaylistId', '=', $id)->delete();

        return redirect()
            ->route('playlists')
            ->with(
                'success',
                "The {$playlist->Name} playlist was successfully deleted"
            );
    }
}
