@extends('Layouts.app')

@section('main')
    <div class="bg-neutral-400 min-h-full">
        <x-nav></x-nav>
        <div class="flex justify-center pt-5 gap-5 bg-neutral-400">
            <div>
                <div class="bg-neutral-800 mx-10 shadow-2xl rounded-md">
                        <div class="container mx-auto grid grid-cols-6 grid-rows-6 gap-5 p-10">
                            <div class="bg-gray-800 col-span-4 row-span-6 flex justify-center">
                                <div class="h-96 w-96 flex items-center">
                                    <img src="http://dreams.test/{{ $product['photo'] }}" alt="Foto del producto">
                                </div>
                            </div>
                            <div
                                class="bg-gray-200 col-span-2 row-span-6 border border-gray-600 flex flex-col gap-3 p-5">
                                <p class="font-alatsi text-4xl text-center">{{ $product['name'] }}</p>
                                <div class="grid grid-cols-4">
                                    <p class="text-3xl col-span-4 font-bold text-center text-green-600">${{ $product['price'] }} COP</p>
{{--                                    <div class="col-span-2 flex justify-center">--}}
{{--                                        <add-button product="{{ $product }}" userId="{{ auth()->user()->id }}"></add-button>--}}
{{--                                    </div>--}}

                                </div>
                                <p>Envío internacional gratis</p>
                                <p>Sin costos de importación</p>
                                <p class="text-xl font-bold text-center">** Almacenes Dreams **</p>
                                <p>Cantidad 1 (<b>{{ $product['available'] }} Disponibles</b>)</p>
                                <p>Solo puedes comprar 1 unidad</p>
                                <button
                                    class="self-center bg-zinc-800 hover:bg-opacity-90 text-2xl text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    <a href="https://checkout-co.placetopay.dev/session/51625/3a61e46593c5a1401d0c70a2e09d9308">Comprar
                                        ahora</a>
                                </button>
                            </div>
                            <div class="bg-gray-100 col-span-4 p-5">
                                <p class="font-alatsi text-3xl">Descripcion</p>
                                <p>{{ $product['description'] }}</p>
                            </div>
                            <div class="bg-gray-100 col-span-2 border border-gray-600 flex flex-col gap-3 p-5">
                                <p>- Compra Protegida, recibe el producto que esperabas o te devolvemos tu dinero</p>
                                <p>- Paga con PlaceToPay</p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--@extends('Layouts.dashboard')--}}

{{--@section('content')--}}

{{--<sub-nav :user_id="{{ auth()->user()->id }}"></sub-nav>--}}

{{--<div class="mx-10 bg-pink-900 mt-5">--}}
{{--    <div class="container mx-auto grid grid-cols-6 grid-rows-6 gap-5 p-10">--}}
{{--        <div class="bg-gray-900 row-span-6">--}}
{{--            <p class="text-white text-center font-bold text-xl">extra</p>--}}
{{--        </div>--}}
{{--        <div class="bg-gray-900 col-span-3 row-span-6">--}}
{{--            <img src="http://dreams.test/{{ $product['photo'] }}" alt="">--}}
{{--            <p class="text-white text-center font-bold text-xl">Imagen</p>--}}
{{--        </div>--}}
{{--        <div class="bg-gray-200 col-span-2 row-span-6 border border-gray-600 flex flex-col gap-3 p-5">--}}
{{--            <p class="font-alatsi text-4xl ">{{ $product['name'] }}</p>--}}
{{--            <div class="grid grid-cols-4">--}}
{{--            <p class="text-3xl col-span-2 font-bold">${{ $product['price'] }}</p>--}}
{{--                <div class="flex justify-end">--}}
{{--                    <add-button></add-button>--}}
{{--                    <button class="self-start bg-zinc-800 hover:bg-opacity-90 text-2xl text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">--}}
{{--                        <a href="{{ route('shop') }}"><shopping-cart-icon class="text-red-500 h-7 w-7 " aria-hidden="true"/></a>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <p class="text-center font-semibold">Agregar al carrito</p>--}}

{{--            </div>--}}
{{--            <p>Envío internacional gratis</p>--}}
{{--            <p>Sin costos de importación</p>--}}
{{--            <p class="text-xl font-bold text-center">** Almacenes Dreams **</p>--}}
{{--            <p>Cantidad 1 (<b>{{ $product['quantity'] }} Disponibles</b>)</p>--}}
{{--            <p>Solo puedes comprar 1 unidad</p>--}}
{{--            <button class="self-center bg-zinc-800 hover:bg-opacity-90 text-2xl text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">--}}
{{--                <a href="https://checkout-co.placetopay.dev/session/51625/3a61e46593c5a1401d0c70a2e09d9308">Comprar ahora</a>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--        <div class="bg-red-300 col-span-4 p-5">--}}
{{--            <p class="font-alatsi text-3xl">Descripcion</p>--}}
{{--            <p>{{ $product['description'] }}</p>--}}
{{--        </div>--}}
{{--        <div class="bg-gray-100 col-span-2 border border-gray-600 flex flex-col gap-3 p-5">--}}
{{--            <p>- Compra Protegida, recibe el producto que esperabas o te devolvemos tu dinero</p>--}}
{{--            <p>- Paga con PlaceToPay</p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


{{--@endsection--}}
