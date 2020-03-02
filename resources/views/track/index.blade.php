@extends('layouts.main')

@section('title', 'Tracks')
@section('header', 'Tracks')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Track</th>
                <th>Album</th>
                <th>Artist</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tracks as $track)
                <tr>
                    <td>{{$track->TrackName}}</td>
                    <td>{{$track->AlbumTitle}}</td>
                    <td>{{$track->ArtistName}}</td>
                    <td>
                        <a href="/tracks/{{$track->TrackId}}/add-to-playlist">Add to Playlist</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
