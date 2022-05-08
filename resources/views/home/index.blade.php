@extends('Layouts.app')

@section('main')
    <div class="bg-neutral-400 min-h-full">
        <x-nav></x-nav>
        <div class="container mx-auto">
            <div class="flex justify-center py-40 shadow-2xl
            bg-[url('https://images.pexels.com/photos/1536286/pexels-photo-1536286.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260')]">
                <span class="font-alatsi text-black text-4xl">Bienvenido a Dreams!</span>
            </div>
        </div>
        <div class="px-52">
            <div class="container mx-auto flex flex-col items-center px-20 mt-10">

                <div class="bg-gray-100 px-10 rounded-md shadow-2xl">
                    <div class="flex gap-5">
                        <div class="py-5">
                            <span class="font-fugaz-one text-black text-4xl">Dreams</span>
                        </div>
                        <div class="py-6 font-fugaz-one text-black text-3xl">X</div>
                        <div class="py-5">
                            <x-place-to-pay-logo></x-place-to-pay-logo>
                        </div>
                    </div>
                </div>

                <div class="my-10 flex flex-col items-center">
                    <span class="font-alatsi text-2xl">Mira nuestros productos mas recientes!</span>
                    <div class="bg-gray-100 py-2 px-10 rounded-md shadow-2xl mt-5">
                        <div class="grid grid-cols-4 gap-5">
                            <card-product :products='@json($products->getCollection())'
                                          :user_id="{{ auth()->user()->id }}">
                            </card-product>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="bg-neutral-900">
            <x-footer></x-footer>
        </div>
    </div>


    {{--    <div class="container mx-auto flex justify-center h-full bg-gray-900 mt-60">--}}

    {{--        <div class="bg-pink-900 rounded-md text-gray-300 p-5 grid grid-cols-2 gap-2">--}}
    {{--            <div>--}}
    {{--                <p class="text-3xl font-bold text-white">Se agrego:</p>--}}
    {{--                <p>- Nuevos logs para el modelo de los productos</p>--}}
    {{--                <p>- Nuevo diseño a la vitrina</p>--}}
    {{--                <p>- Interfaz para visualizar cada producto en especifico</p>--}}
    {{--                <p>- Limpieza de codigo </p>--}}
    {{--            </div>--}}
    {{--            <div>--}}
    {{--                <br><p>- Se integro la Api de Crear session de webcheckout</p>--}}
    {{--                    <p>- Se integro la Api de Consultar session de webcheckout</p>--}}
    {{--            </div>--}}


    {{--        </div>--}}

    {{--    </div>--}}
@endsection
