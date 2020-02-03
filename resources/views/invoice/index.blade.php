<table>
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
          {{date_format(date_create($invoice->InvoiceDate), 'n/j/Y')}}
        </td>
        <td>
          {{$invoice->FirstName}} {{$invoice->LastName}}
        </td>
        <td>
          ${{$invoice->Total}}
        </td>
        <td>
          <a href="invoice-details.php?invoice={{$invoice->InvoiceId}}">
            Details
          </a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
