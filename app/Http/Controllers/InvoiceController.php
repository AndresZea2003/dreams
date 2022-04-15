<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\invoice;

class InvoiceController extends Controller
{
    public function index()
    {
        return view('shop');
    }

    public function create()
    {
        //
    }

    public function store(StoreInvoiceRequest $request)
    {
        $invoice = new invoice();
        $invoice->reference = '#' . $request->input('reference');
        $invoice->total = $request->input('total');
        $invoice->status = $request->input('status');

        $invoice->save();
        return redirect(route('shop', $invoice));
    }

    public function show(invoice $invoices)
    {
        //
    }

    public function edit(invoice $invoices)
    {
        //
    }

    public function update(UpdateInvoiceRequest $request, invoice $invoices)
    {
        //
    }

    public function destroy(invoice $invoices)
    {
        //
    }
}
