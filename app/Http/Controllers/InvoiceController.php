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
            ->orderBy('InvoiceDate', 'desc')
            ->get();

        return view('invoice.index', [
            'invoices' => $invoices
        ]);
    }

    public function show($id)
    {
        $invoice = DB::table('invoices')
            ->where('InvoiceId', '=', $id)
            ->first();

        $tracks = DB::table('invoice_items')
            ->select(
                'invoice_items.UnitPrice',
                'tracks.Name as TrackName',
                'albums.Title as AlbumTitle',
                'artists.Name as ArtistName'
            )
            ->where('InvoiceId', '=', $id)
            ->join('tracks', 'tracks.TrackId', '=', 'invoice_items.TrackId')
            ->join('albums', 'tracks.AlbumId', '=', 'albums.AlbumId')
            ->join('artists', 'albums.ArtistId', '=', 'artists.ArtistId')
            ->get();

        return view('invoice.show', [
            'invoice' => $invoice,
            'tracks' => $tracks
        ]);
    }
}
