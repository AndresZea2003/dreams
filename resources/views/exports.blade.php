@extends('Layouts.app')

@section('main')
    <div class="bg-neutral-400 min-h-full">
        <x-nav></x-nav>
        <div class="flex justify-center pt-10 gap-5 bg-neutral-400">
            <div>
                <div class="bg-gray-300 p-10 shadow-2xl rounded-md flex">
                    <h1 class="text-3xl text-center font-bold">EXPORTAR PRODUCTOS ATRAVEZ DE EXCEL</h1>
                    <div class="h-10 w-10 mx-5">
                        <img src="http://dreams.test/images/ExcelLogo.svg.png" alt="Logo Excel">
                    </div>
                </div>
                <div class="bg-gray-300 p-10 shadow-2xl rounded-md mt-10">
                    <h1 class="text-3xl text-center font-bold">PRODUCT EXPORT</h1><br>
                    <form action="{{ route('export-download') }}" enctype="multipart/form-data">
                        <div class="">
                            <p class="text-center">Descarga un archivo con todos los Productos</p><br>
                            <div class="grid grid-cols-2">
                                <div class="flex flex-col">
                                    <p class="text-center font-bold text-xl">Fecha Inicial</p>
                                    <input type="date" id="start" name="initialDate"
                                       value="2022-04-07" min="2018-01-01" max="2022-04-07">
                                </div>
                                <div class="flex flex-col">
                                    <p class="text-center font-bold text-xl">Fecha Final</p>
                                    <input type="date" id="start" name="finalDate"
                                       value="2022-04-07" min="2018-01-01" max="2022-04-07">
                                </div>
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
        </div>
    </div>
    </div>
@endsection

{{--@extends('Layouts.app')--}}

{{--@section('main')--}}

{{--    <div class="flex flex-col justify-center items-center h-screen bg-neutral-900">--}}
{{--        <div class="bg-gray-200 rounded-md p-5 shadow-lg border border-black">--}}
{{--            <h1 class="text-3xl text-center font-bold">PRODUCT EXPORT</h1><br>--}}
{{--            <form action="{{ route('export-download') }}" enctype="multipart/form-data">--}}
{{--                <div class="">--}}
{{--                    <p class="text-center">Descarga un archivo con todos los ToDos</p><br>--}}

{{--                    <div class="grid grid-cols-3">--}}
{{--                        <p class="text-center font-bold text-xl">Initial Date</p>--}}
{{--                        <p class="text-center font-bold text-xl">Final Date</p>--}}
{{--                        <p class="text-center font-bold text-xl">Status</p>--}}
{{--                        <input type="date" id="start" name="initialDate"--}}
{{--                               value="2022-04-07" min="2018-01-01" max="2022-04-07">--}}
{{--                        <input type="date" id="start" name="finalDate"--}}
{{--                               value="2022-04-07" min="2018-01-01" max="2022-04-07">--}}
{{--                        <select name="status" id="">--}}
{{--                            <option value="pending">base</option>--}}
{{--                            <option value="in_progress">In Progress</option>--}}
{{--                            <option value="complete">Complete</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}

{{--                    <div class="flex flex-col"><br>--}}
{{--                        <button--}}
{{--                            class="bg-zinc-800 hover:opacity-80 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"--}}
{{--                            type="submit">--}}
{{--                            DESCARGAR--}}
{{--                        </button>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
