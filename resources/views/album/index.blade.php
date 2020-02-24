@extends('layouts.main')

@section('title', 'Albums')
@section('header', 'Albums')

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="text-right mb-3">
        <a href="/albums/create" class="btn btn-primary">Add Album</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Album</th>
                <th>Artist</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($albums as $album)
                <tr>
                    <td>{{$album->Title}}</td>
                    <td>{{$album->artist->Name}}</td>
                    <td>
                        <a href="/albums/{{$album->AlbumId}}/delete">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
