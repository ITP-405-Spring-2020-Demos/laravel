@extends('layouts.main')

@section('title', 'Playlists')
@section('header', 'Playlists')

@section('content')
    <div class="text-right mb-4">
        <a href="/playlists/new" class="btn btn-primary">New Playlist</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Playlist</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($playlists as $playlist)
                <tr>
                    <td>
                        <a href="/playlists/{{$playlist->PlaylistId}}">{{$playlist->Name}}</a>
                    </td>
                    <td>
                        <a href="/playlists/{{$playlist->PlaylistId}}/edit">Edit</a>
                        |
                        <a href="/playlists/{{$playlist->PlaylistId}}/delete">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
