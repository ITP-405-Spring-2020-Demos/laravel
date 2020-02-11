@extends('layouts.main')

@section('title', 'Delete Album')
@section('header', 'Delete Album')

@section('content')
    <form action="/albums/{{$album->AlbumId}}/delete" method="POST">
        @csrf
        <p>Are you sure you want to delete {{$album->Title}} by {{$artist->Name}}?</p>
        <a href="/albums" class="btn btn-default">Cancel</a>
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection
