@extends('layouts.main')

@section('title', 'Delete Playlist')
@section('header', 'Delete Playlist')

@section('content')
    <form method="post" action="/playlists/{{$playlist->PlaylistId}}/delete">
        @csrf
        <p>
            Are you sure you want to delete the {{$playlist->Name}} playlist?
        </p>
        <a href="/playlists" class="btn btn-secondary">Cancel</a>
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection
