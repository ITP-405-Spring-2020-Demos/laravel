@extends('layouts.main')

@section('title', 'Albums')
@section('header', 'Albums')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Album</th>
                <th>Artist</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($albums as $album)
                <tr>
                    <td>{{$album->Title}}</td>
                    <td>{{$album->ArtistName}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
