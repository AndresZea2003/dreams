@extends('Layouts.dashboard')

@section('content')

    <div class="bg-gray-900">
        <div class="grid grid-cols-12 px-5 py-5 container mx-auto flex">
            <div class="flex col-span-4 text-white justify-center">
                    Mis compras
                    <shopping-bag-icon class="h-7 w-7 mx-5"/>
            </div>
            <div class="flex col-span-4 text-white justify-center">
                    Favoritos
                    <star-icon class="h-7 w-7 mx-5"/>
            </div>
            <div class="flex col-span-4 text-white justify-center">
                    Carrito
                    <shopping-cart-icon class="h-7 w-7 mx-5"/>
            </div>
        </div>
    </div>

    <div class="mx-40 mt-10 ">

        <div class="container mx-auto">

            <div class="grid grid-cols-5 grid-rows-6 gap-5 ">
                <div class="bg-pink-900 rounded-md drop-shadow-lg row-span-6 p-5">
                    <p class="text-xl font-bold text-white">Lorem</p>

            <div class="input-group relative flex items-stretch py-5">

                <input type="search" class="form-control relative flex-auto min-w-0 block px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-gray-600 focus:outline-none" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                <button class="btn inline-block px-6 py-2.5 bg-gray-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out flex items-center" type="button" id="button-addon2">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                    </svg>
                </button>
            </div>

                <div>
                    <p class="text-xl font-bold text-white py-5"> Filtros </p>

                    <p class="hover:text-white cursor-pointer hover:scale-110 text-center"> Recien Agregados </p>
                    <p class="hover:text-white cursor-pointer hover:scale-110 text-center"> Mejores precios </p>
                    <p class="hover:text-white cursor-pointer hover:scale-110 text-center"> Ultimos disponibles </p>
                    <p class="hover:text-white cursor-pointer hover:scale-110 text-center"> En oferta </p>
                </div>

                </div>


                <div class="bg-pink-900 rounded-md drop-shadow-lg col-span-4 row-span-6 grid grid-cols-3 gap-5 p-5 z-0">
                    <card-product :products="{{json_encode($products['data'])}}"></card-product>
                </div>

            </div>

    </div>
</div>



{{--    <div class="container mx-auto">--}}


{{--<div class="flex justify-center mt-10 mx-10">--}}
{{--    <div class="mb-3 xl:w-96 flex border-r border border-gray-600">--}}
{{--        <div class="bg-zinc-800">--}}
{{--            <div class="input-group relative flex flex-wrap items-stretch mt-10 mx-10">--}}
{{--                <span class="text-white font-alatsi text-2xl">Search a product</span>--}}
{{--                <input type="search" class="form-control relative flex-auto min-w-0 block px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-gray-600 focus:outline-none" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">--}}
{{--                <button class="btn inline-block px-6 py-2.5 bg-gray-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out flex items-center" type="button" id="button-addon2">--}}
{{--                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">--}}
{{--                    <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>--}}
{{--                    </svg>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="flex grid grid-cols-3 bg-zinc-900">--}}
{{--        <card-product :products="{{json_encode($products['data'])}}"></card-product>--}}
{{--    </div>--}}
{{--</div>--}}
{{--    </div>--}}

{{--        @foreach($products['data'] as $product)--}}
{{--            <card-product  name="{{ $product['name'] }}" price="{{ $product['price'] }}" id="{{ $product['id'] }}"></card-product>--}}
{{--        @endforeach--}}
{{--{{ dd($products) }}--}}
@endsection
