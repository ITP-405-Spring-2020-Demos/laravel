<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Date</th>
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
