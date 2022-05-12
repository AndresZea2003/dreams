@extends('Layouts.app')

@section('main')

    <div class="flex flex-col justify-center items-center h-screen bg-neutral-900">
        <div class="bg-gray-200 rounded-md p-5 shadow-lg border border-black">
            <h1 class="text-3xl text-center font-bold">PRODUCT EXPORT</h1><br>
            <form action="{{ route('export-download') }}" enctype="multipart/form-data">
                <div class="">
                    <p class="text-center">Descarga un archivo con todos los ToDos</p><br>

                    <div class="grid grid-cols-3">
                        <p class="text-center font-bold text-xl">Initial Date</p>
                        <p class="text-center font-bold text-xl">Final Date</p>
                        <p class="text-center font-bold text-xl">Status</p>
                        <input type="date" id="start" name="initialDate"
                               value="2022-04-07" min="2018-01-01" max="2022-04-07">
                        <input type="date" id="start" name="finalDate"
                               value="2022-04-07" min="2018-01-01" max="2022-04-07">
                        <select name="status" id="">
                            <option value="pending">base</option>
                            <option value="in_progress">In Progress</option>
                            <option value="complete">Complete</option>
                        </select>
                    </div>

                    <div class="flex flex-col"><br>
                        <button
                            class="bg-zinc-800 hover:opacity-80 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            DESCARGAR
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
