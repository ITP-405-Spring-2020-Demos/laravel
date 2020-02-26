@extends('layouts.main')

@section('title', 'Playlists')
@section('header', 'Playlists')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Playlist</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($playlists as $playlist)
                <tr>
                    <td>
                        <a href="/playlists/{{$playlist->PlaylistId}}">{{$playlist->Name}}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
