<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\invoice;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class InvoiceController extends Controller
{
    public function index(): view
    {
        return view('invoices.index');
    }

    public function create()
    {
        //
    }

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

    public function show(invoice $invoice): view
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
