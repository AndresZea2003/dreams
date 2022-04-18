<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\invoice;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $invoice = new Invoice;
        $id = $invoice['id'];

        $invoice->reference = (random_int(1000000000, 10000000000));
        $invoice->user_id = auth()->user()->id;
        $invoice->quantity_products = $request->input('quantity_products');
        $invoice->total = $request->input('total');
        $invoice->status = Invoice::PENDING;

        $invoice->save();


        return redirect(route('invoices.show'.$id, $invoice));

    }

    public function show(invoice $invoice)
    {
        return view('invoices.show', compact('invoice'));
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
