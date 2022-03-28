@extends('Layouts.dashboard')

@section('content')
<div class="mx-10 bg-pink-900 mt-5">
    <div class="container mx-auto grid grid-cols-6 grid-rows-6 gap-5 p-10">
        <div class="bg-gray-900 row-span-6">
            <p class="text-white text-center font-bold text-xl">extra</p>
        </div>
        <div class="bg-gray-900 col-span-3 row-span-6">
            <p class="text-white text-center font-bold text-xl">Imagen</p>
        </div>
        <div class="bg-gray-200 col-span-2 row-span-6 border border-gray-600 flex flex-col gap-3 p-5">
            <p class="font-alatsi text-4xl ">{{ $product['name'] }}</p>
            <div class="grid grid-cols-4">
            <p class="text-3xl col-span-2 font-bold">${{ $product['price'] }}</p>
                <div class="flex justify-end">
                    <button class="self-start bg-zinc-800 hover:bg-opacity-90 text-2xl text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        <a href="{{ route('shop') }}"><shopping-cart-icon class="text-red-500 h-7 w-7 " aria-hidden="true"/></a>
                    </button>
                </div>
                <p class="text-center font-semibold">Agregar al carrito</p>

            </div>
            <p>Envío internacional gratis</p>
            <p>Sin costos de importación</p>
            <p class="text-xl font-bold text-center">** Almacenes Dreams **</p>
            <p>Cantidad 1 (<b>{{ $product['quantity'] }} Disponibles</b>)</p>
            <p>Solo puedes comprar 1 unidad</p>
            <button class="self-center bg-zinc-800 hover:bg-opacity-90 text-2xl text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                <a href="{{ config('webcheckout.url') }}">Comprar ahora</a>
            </button>
        </div>
        <div class="bg-red-300 col-span-4 p-5">
            <p class="font-alatsi text-3xl">Descripcion</p>
            <p>{{ $product['description'] }}</p>
        </div>
        <div class="bg-gray-100 col-span-2 border border-gray-600 flex flex-col gap-3 p-5">
            <p>- Compra Protegida, recibe el producto que esperabas o te devolvemos tu dinero</p>
            <p>- Paga con PlaceToPay</p>
        </div>
    </div>
</div>





@endsection
