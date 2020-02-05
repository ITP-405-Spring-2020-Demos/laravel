<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $invoices = DB::table('invoices')
            ->join('customers', 'invoices.CustomerId', '=', 'customers.CustomerId')
            ->orderBy('InvoiceDate', 'desc');

        $customerQueryStringParam = $request->query('customer');

        if ($customerQueryStringParam) {
            $invoices->where('customers.FirstName', 'LIKE', "%$customerQueryStringParam%");
            $invoices->orWhere('customers.LastName', 'LIKE', "%$customerQueryStringParam%");
        }
        
        return view('invoice.index', [
            'invoices' => $invoices->get(),
            'customerQueryStringParam' => $customerQueryStringParam
        ]);
    }

    public function show($id)
    {
        $invoice = DB::table('invoices')->where('InvoiceId', '=', $id)->first();

        $tracks = DB::table('invoice_items')
            ->select(
                'invoice_items.UnitPrice',
                'tracks.Name as TrackName',
                'albums.Title as AlbumTitle',
                'artists.Name as ArtistName'
            )
            ->where('InvoiceId', '=', $id)
            ->join('tracks', 'invoice_items.TrackId', '=', 'tracks.TrackId')
            ->join('albums', 'tracks.AlbumId', '=', 'Albums.AlbumId')
            ->join('artists', 'albums.ArtistId', '=', 'artists.ArtistId')
            ->get();

        return view('invoice.show', [
            'invoice' => $invoice,
            'tracks' => $tracks
        ]);
    }
}
