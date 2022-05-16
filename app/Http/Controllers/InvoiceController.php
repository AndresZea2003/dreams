<?php

namespace App\Http\Controllers;

use App\Models\invoice;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InvoiceController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $invoice = new Invoice();
        $id = $invoice['id'];

        $invoice->reference = (random_int(1000000000, 10000000000));
        $invoice->user_id = auth()->user()->id;
        $invoice->quantity_products = $request->input('quantity_products');
        $invoice->total = $request->input('total');
        $invoice->status = Invoice::PENDING;

        $invoice->save();

        return redirect(route('invoices.show' . $id, $invoice));
    }

    public function show(invoice $invoice): View
    {
        return view('invoices.show', compact('invoice'));
    }
}
