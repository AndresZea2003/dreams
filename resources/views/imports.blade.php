@extends('Layouts.app')

@section('main')
    <div class="bg-neutral-400 min-h-full">
        <x-nav></x-nav>
        <div class="flex flex-col justify-center pt-10 gap-5 bg-neutral-400 container mx-auto px-48">
            <div class="bg-gray-300 p-10 shadow-2xl rounded-md flex justify-center">
                <h1 class="text-3xl text-center font-bold">IMPORTAR PRODUCTOS ATRAVEZ DE EXCEL</h1>
                <div class="h-10 w-10 mx-5">
                    <img src="http://dreams.test/images/ExcelLogo.svg.png" alt="Logo Excel">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div class="bg-gray-300 px-10 py-5 shadow-2xl rounded-md">
                    <form action="{{ route('imports') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <span class="text-2xl flex justify-center font-bold">CREAR PRODUCTOS</span>
                        <div class="pt-2">
                            <span class="font-alatsi text-xl flex justify-center">Crea productos de manera masiva</span>
                            <span class="font-bold">Nota: </span>
                            <span>El encabezado del archivo excel debe tener las siguientes columnas:</span><br>
                            <div class="grid grid-cols-2">
                                <span class="font-bold">- Name</span>
                                <span class="font-bold">- Description</span>
                                <span class="font-bold">- Price</span>
                                <span class="font-bold">- Available</span>
                            </div>
                            <br>
                            <div class="flex justify-center">
                                <input type="file" name="products"><br>

                            </div>

                            <div class="flex flex-col"><br>
                                <button
                                    class="bg-zinc-800 hover:opacity-80 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                    type="submit" value="login">
                                    <input type="submit">
                                </button>
                            </div>

                        </div>
                    </form>
                </div>

                <div class="bg-gray-300 px-10 py-5 shadow-2xl rounded-md">

                    <form action="{{ route('update-imports') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <span class="text-2xl flex justify-center font-bold">ACTUALIZA PRODUCTOS</span>
                        <div class="pt-2">
                            <span
                                class="font-alatsi flex justify-center text-xl">Actualiza productos de manera masiva</span>
                            <span class="font-bold">Nota: </span>
                            <span>Es recomendable que antes de realizar la actualizacion de los productos , por favor exporta los
                                    productos, si no los has exportado a un archivo excel puedes hacerlo dandole
                                    <a href="{{ route('exports') }}" class="text-blue-600 hover:text-blue-600">click aqui</a>
                                </span><br>
                            <br>
                            <div class="flex justify-center py-2">
                                <input type="file" name="products"><br>

                            </div>

                            <div class="flex flex-col"><br>
                                <button
                                    class="bg-zinc-800 hover:opacity-80 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                    type="submit" value="login">
                                    <input type="submit">
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
{{--            <h1 class="text-3xl text-center font-bold">PRODUCTS IMPORT</h1><br>--}}
{{--            <form action="{{ route('imports') }}" enctype="multipart/form-data" method="POST">--}}
{{--                @csrf--}}
{{--                <div class="">--}}
{{--                    <p class="text-center">Ingrese el archivo</p><br>--}}
{{--                    <input type="file" name="products"><br>--}}

{{--                    <div class="flex flex-col"><br>--}}
{{--                        <button--}}
{{--                            class="bg-zinc-800 hover:opacity-80 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"--}}
{{--                            type="submit" value="login">--}}
{{--                            <input type="submit">--}}
{{--                        </button>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}

{{--        <div class="bg-gray-200 rounded-md p-5 shadow-lg border border-black">--}}
{{--            <h1 class="text-3xl text-center font-bold">UPDATE PRODUCTS IMPORT</h1><br>--}}
{{--            <form action="{{ route('update-imports') }}" enctype="multipart/form-data" method="POST">--}}
{{--                @csrf--}}
{{--                <div class="">--}}
{{--                    <p class="text-center">Ingrese el archivo</p><br>--}}
{{--                    <input type="file" name="products"><br>--}}

{{--                    <div class="flex flex-col"><br>--}}
{{--                        <button--}}
{{--                            class="bg-zinc-800 hover:opacity-80 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"--}}
{{--                            type="submit" value="login">--}}
{{--                            <input type="submit">--}}
{{--                        </button>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
