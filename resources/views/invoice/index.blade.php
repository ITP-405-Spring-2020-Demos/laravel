@extends('layouts.app')

@section('title', 'Invoices')

@section('header', 'Invoices')

@section('content')
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Date</th>
        <th>Customer</th>
        <th colspan="2">Total</th>
      </tr>
    </thead>
    <tbody>
      @foreach($invoices as $invoice)
        <tr>
          <td>
            {{$invoice->InvoiceId}}
          </td>
          <td>
            {{$invoice->InvoiceDate}}
          </td>
          <td>
            {{$invoice->FirstName}} {{$invoice->LastName}}
          </td>
          <td>
            ${{$invoice->Total}}
          </td>
          <td>
            <a href="/invoices/{{$invoice->InvoiceId}}">
              Details
            </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
