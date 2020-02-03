@extends('layouts.app')

@section('title', 'Invoices')

@section('header', 'Invoices')

@section('content')
  <form action="/invoices" method="get">
    <div class="form-group">
      <input
        type="search"
        name="customer"
        value="{{$customerQueryStringParam ? $customerQueryStringParam : ''}}"
        class="form-control"
        placeholder="Search by Customer First Name or Last Name">
    </div>
    <button type="submit" class="btn btn-primary">Search</button>
    <a href="/invoices" class="btn btn-secondary">Clear</a>
  </form>
  <table class="table table-striped mt-3">
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
