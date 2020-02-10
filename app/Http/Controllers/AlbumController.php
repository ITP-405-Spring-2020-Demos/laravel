<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = DB::table('albums')
            ->select('albums.AlbumId', 'albums.Title', 'artists.Name as ArtistName')
            ->join('artists', 'albums.ArtistId', '=', 'artists.ArtistId')
            ->orderBy('ArtistName')
            ->orderBy('Title')
            ->get();

        return view('album.index', [
            'albums' => $albums
        ]);
    }

    public function create()
    {
        return view('album.create', [
            'artists' => DB::table('artists')->orderBy('Name')->get()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:20',
            'artist' => 'required|exists:artists,ArtistId'
        ]);

        DB::table('albums')->insert([
            'Title' => $request->input('title'),
            'ArtistId' => $request->input('artist')
        ]);

        $artist = DB::table('artists')
            ->where('ArtistId', '=', $request->input('artist'))
            ->first();

        return redirect()
            ->route('albums')
            ->with('success', "Successfully created {$artist->Name} - {$request->input('title')}");
    }

    public function deleteConfirmation($id)
    {
        $album = DB::table('albums')->where('AlbumId', '=', $id)->first();
        $artist = DB::table('artists')->where('ArtistId', '=', $album->ArtistId)->first();

        return view('album.delete-confirmation', [
            'album' => $album,
            'artist' => $artist
        ]);
    }

    public function destroy($id)
    {
        $album = DB::table('albums')->where('AlbumId', '=', $id)->first();

        $this->deleteAlbum($id);

        return redirect()
            ->route('albums')
            ->with('success', "Album {$album->Title} successfully deleted");
    }

    private function deleteAlbum($id)
    {
        $trackIds = DB::table('tracks')->where('AlbumId', '=', $id)->get()->pluck('TrackId');

        DB::table('invoice_items')->whereIn('TrackId', $trackIds)->delete();
        DB::table('playlist_track')->whereIn('TrackId', $trackIds)->delete();
        DB::table('tracks')->whereIn('TrackId', $trackIds)->delete();
        DB::table('albums')->where('AlbumId', '=', $id)->delete();
    }
}
