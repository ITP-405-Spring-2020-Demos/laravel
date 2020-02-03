<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = DB::table('invoices')
            ->join('customers', 'invoices.CustomerId', '=', 'customers.CustomerId')
            ->get();

        return view('invoice.index', [
            'invoices' => $invoices
        ]);
    }
}
