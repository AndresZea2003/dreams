<h1>Invoice</h1>

<div class="bg-red-400 p-10">
            <form action="{{ route('invoices.store') }}" method="POST">
                @csrf
                <p class="text-xl font-bold">Crear invoice</p><br>
                <p>Reference</p>
                <input type="text" name="reference">
                <p>Total</p>
                <input type="number" name="total">
                <p>Status</p>
                <select name="select">
                    <option value="value1">REJECTED</option>
                    <option value="value2" selected>PENDING</option>
                    <option value="value3">APPROVED</option>
                </select>
                <button type="submit" class="bg-gray-900 text-white p-2 border border-black">Enviar</button>
            </form>
        </div>
