@extends('layouts.main')

@section('title')
    @if ($playlist)
        Playlists: {{$playlist->Name}}
    @else
        Playlist not found
    @endif
@endsection

@section('header')
    @if ($playlist)
        Playlists: {{$playlist->Name}}
    @else
        Playlist not found
    @endif
@endsection

@section('content')
    @if ($playlist)
        <p>Total Tracks: {{count($tracks)}}</p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Track</th>
                    <th>Album</th>
                    <th>Artist</th>
                    <th>Media Type</th>
                    <th>Genre</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tracks as $track)
                    <tr>
                        <td>{{$track->TrackName}}</td>
                        <td>{{$track->AlbumTitle}}</td>
                        <td>{{$track->ArtistName}}</td>
                        <td>{{$track->MediaTypeName}}</td>
                        <td>{{$track->GenreName}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No tracks found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    @else
        <p>Playlist not found.</p>
    @endif
@endsection
