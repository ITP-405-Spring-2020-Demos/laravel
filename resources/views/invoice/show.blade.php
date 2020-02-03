@extends('layouts.app')

@section('title')
  Invoice #{{$invoice->InvoiceId}}
@endsection

@section('header')
  Invoice #{{$invoice->InvoiceId}}
@endsection

@section('content')
  <a href="/invoices" class="d-block mb-3">Back</a>
  <p>Invoice Total: ${{$invoice->Total}}</p>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Track</th>
        <th>Album</th>
        <th>Artist</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
      @foreach($tracks as $track)
        <tr>
          <td>{{$track->TrackName}}</td>
          <td>{{$track->AlbumTitle}}</td>
          <td>{{$track->ArtistName}}</td>
          <td>${{$track->UnitPrice}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
