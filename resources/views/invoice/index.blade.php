@extends('layouts.main')

@section('title', 'Invoices')
@section('header', 'Invoices')

@section('content')
  <form action="/invoices" method="get">
    <div class="form-group">
      <input
        type="search"
        value="{{$customerQueryStringParam ? $customerQueryStringParam : ''}}"
        name="customer"
        class="form-control"
        placeholder="Search by customer first name or last name">
    </div>
    <button type="submit" class="btn btn-primary">Search</button>
    <a href="/invoices" class="btn btn-secondary">Clear</a>
  </form>
  <table class="table table-striped mt-3">
    <thead>
      <th>ID</th>
      <th>Date</th>
      <th>Customer</th>
      <th>Total</th>
      <th></th>
    </thead>
    <tbody>
      @foreach($invoices as $invoice)
        <tr>
          <td>
            {{$invoice->InvoiceId}}
          </td>
          <td>
            {{date_format(date_create($invoice->InvoiceDate), 'n/j/Y')}}
          </td>
          <td>
            {{$invoice->FirstName}} {{$invoice->LastName}}
          </td>
          <td>
            ${{$invoice->Total}}
          </td>
          <td>
            <a href="/invoices/{{$invoice->InvoiceId}}">Details</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection