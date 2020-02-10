@extends('layouts.main')

@section('title', 'New Album')
@section('header', 'New Album')

@section('content')
    <form action="/albums" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control">
            @error('title')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="artist">Artist</label>
            <select name="artist" id="artist" class="form-control">
                <option value="">-- Select Artist --</option>
                @foreach($artists as $artist)
                    <option value="{{$artist->ArtistId}}">
                        {{$artist->Name}}
                    </option>
                @endforeach
            </select>
            @error('artist')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">
            Save
        </button>
    </form>
@endsection
