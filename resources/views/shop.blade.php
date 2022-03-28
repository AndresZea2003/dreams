@extends('Layouts.dashboard')

@section('content')
    <div class="container mx-auto">
        <div class=" mx-10 p-5">
            <p class="text-center font-alatsi text-4xl text-gray-300">Lista de productos agregados al carrito</p><br>
            <div class="bg-pink-900 text-white mx-60 grid  grid-cols-6 p-10 gap-5 rounded-md drop-shadow-lg">
                <div class=" p-5 font-alatsi text-2xl col-span-6 border-b-2 border-black">Carrito (  )</div>

                <div class=" p-5 border-r border-black">ID</div>
                <div class="col-span-3 p-5 border-r border-black">Name</div>
                <div class="flex flex-col">
                    <div>
                        <div class="custom-number-input h-10 w-32">
                            <p class="w-full text-sm text-center">Disponibles</p>
                            <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                                <button data-action="decrement" class=" bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                                    <span class="m-auto text-2xl font-thin">−</span>
                                </button>
                                <input type="number" class="outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="custom-input-number" value="0"></input>
                                <button data-action="increment" class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                    <span class="m-auto text-2xl font-thin">+</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <p class="text-center p-5">Precio</p>
                </div>

                <div class="col-span-5">
                    nada
                </div>

                <div>
                    <p class="text-center">Total a pagar: </p>
                </div>

                <div class="col-span-4">
                    <button class="bg-zinc-800 hover:bg-opacity-90 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        <a href="{{ route(('products.index')) }}">
                            Regresar a la tienda
                        </a>
                        </button>
                </div>

                <div class="col-span-2 flex justify-end">
                    <div>
                        <button class="bg-zinc-800 hover:bg-opacity-90 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        <a href="{{ config('webcheckout.url') }}">
                            Continuar con el pago
                        </a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
