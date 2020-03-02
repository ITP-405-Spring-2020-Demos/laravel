@extends('layouts.main')

@section('title', 'New Playlist')
@section('header', 'New Playlist')

@section('content')
    <form method="post" action="/playlists">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
