@extends('layouts.main')

@section('title', 'Edit Playlist')
@section('header', 'Edit Playlist')

@section('content')
    <form method="post" action="/playlists/{{$playlist->PlaylistId}}/edit">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $playlist->Name }}">
            @error('name')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
