@extends('layouts.main')

@section('title', 'Profile')

@section('header', 'Profile')

@section('content')
    <h3>Hello, {{$user->name}}</h3>
    <p>Your email is {{$user->email}}</p>
@endsection
