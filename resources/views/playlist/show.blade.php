@extends('layouts.main')

@section('title')
    Playlists: {{$playlist->Name}}
@endsection

@section('header')
    Playlists: {{$playlist->Name}}
@endsection

@section('content')
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
@endsection
