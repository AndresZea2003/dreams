<h1>Invoice</h1>

<div class="bg-red-400 p-10">
{{--    $invoice->user_id = auth()->user()->id;--}}
{{--        $invoice->quantity = $request->input('total_quantity');--}}
{{--        $invoice->total_price = $request->input('total_price');--}}

{{--        $invoice->save();--}}
{{--        return redirect('invoices.index');--}}
            <form action="{{ route('payments.store') }}" method="POST">
                @csrf
{{--                <p class="text-xl font-bold">Crear invoice</p><br>--}}
                <p>invoice</p>
                <input type="number" name="invoice_id">

                <p>description</p>
                <input type="text" name="description">
                <p>amount</p>
                <input type="number" name="amount">
{{--                <p>Status</p>--}}
                <p>reference</p>
                <input type="text" name="reference">
                <button type="submit" class="bg-gray-900 text-white p-2 border border-black">Enviar</button>
            </form>
        </div>
