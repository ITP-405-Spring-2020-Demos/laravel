<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Album;
use App\Artist;

class AlbumController extends Controller
{
    public function index()
    {
        // $albums = DB::table('albums')
        //     ->select('albums.AlbumId', 'albums.Title', 'artists.Name as ArtistName')
        //     ->join('artists', 'albums.ArtistId', '=', 'artists.ArtistId')
        //     ->orderBy('artists.Name')
        //     ->orderBy('albums.Title')
        //     ->get();

        $albums = Album::with(['artist'])
            ->join('artists', 'albums.ArtistId', '=', 'artists.ArtistId')
            ->orderBy('artists.Name')
            ->orderBy('Title')
            ->get();

        return view('album.index', [
            'albums' => $albums
        ]);
    }

    public function create()
    {
        return view('album.create', [
            // 'artists' => DB::table('artists')->orderBy('Name')->get()
            'artists' => Artist::orderBy('Name')->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:20',
            'artist' => 'required|exists:artists,ArtistId'
        ]);

        // DB::table('albums')->insert([
        //     'Title' => $request->input('title'),
        //     'ArtistId' => $request->input('artist')
        // ]);

        $album = new Album();
        $album->Title = $request->input('title');
        $album->artist()->associate(Artist::find($request->input('artist')));
        $album->save();

        // $artist = DB::table('artists')
        //     ->where('ArtistId', '=', $request->input('artist'))
        //     ->first();

        return redirect()
            ->route('albums')
            ->with(
                'success',
                "Successfully created {$album->artist->Name} - {$request->input('title')}"
            );
    }

    public function deleteConfirmation($id)
    {
        // $album = DB::table('albums')->where('AlbumId', '=', $id)->first();
        // $artist = DB::table('artists')->where('ArtistId', '=', $album->ArtistId)->first();

        $album = Album::find($id);

        return view('album.delete-confirmation', [
            'album' => $album,
            'artist' => $album->artist
        ]);
    }

    public function destroy($id)
    {
        // $album = DB::table('albums')->where('AlbumId', '=', $id)->first();
        $album = Album::find($id);
        $this->deleteAlbum($album);

        return redirect()
            ->route('albums')
            ->with(
                'success',
                "Album {$album->Title} successfully deleted"
            );
    }

    private function deleteAlbum($album)
    {
        $trackIds = $album->tracks->pluck('TrackId');

        DB::table('invoice_items')->whereIn('TrackId', $trackIds)->delete();
        DB::table('playlist_track')->whereIn('TrackId', $trackIds)->delete();
        $album->tracks()->delete();
        $album->delete();
    }

    // private function deleteAlbum($id)
    // {
    //     $trackIds = DB::table('tracks')
    //         ->where('AlbumId', '=', $id)
    //         ->get()
    //         ->pluck('TrackId');

    //     DB::table('invoice_items')->whereIn('TrackId', $trackIds)->delete();
    //     DB::table('playlist_track')->whereIn('TrackId', $trackIds)->delete();
    //     DB::table('tracks')->whereIn('TrackId', $trackIds)->delete();
    //     DB::table('albums')->where('AlbumId', '=', $id)->delete();
    // }
}
