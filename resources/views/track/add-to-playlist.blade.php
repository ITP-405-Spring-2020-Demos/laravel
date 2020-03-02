@extends('layouts.main')

@section('title', 'Add to Playlist')
@section('header', 'Add to Playlist')

@section('content')
    <form action="/tracks/{{$trackId}}/add-to-playlist" method="POST">
        @csrf
        <div class="form-group">
            <label for="playlist">Playlist</label>
            <select name="playlist" id="playlist" class="form-control">
                @foreach ($playlists as $playlist)
                    <option value="{{$playlist->PlaylistId}}">
                        {{$playlist->Name}}
                    </option>
                @endforeach
            </select>
            @error('playlist')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add to Playlist</button>
    </form>
@endsection
