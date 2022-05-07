@extends('Layouts.app')

@section('main')
    <div class="bg-neutral-400 min-h-full">
        <x-nav></x-nav>
        <div class="flex justify-center pt-10 gap-5 bg-neutral-400">
            <div>
                <div class="bg-gray-300 p-10 shadow-2xl rounded-md">
                    <div class="flex flex-col items-center">
                        <span class="font-alatsi text-2xl">Panel Administrador</span>
                    </div>
                    <div class="grid grid-cols-2 gap-10 mt-10">
                        <a class="bg-blue-600 shadow-2xl rounded-md" href="{{ route('users.index') }}">
                            <div>
                                <div class="flex justify-center">
                                    <span class="font-alatsi text-2xl">Usuarios</span>
                                </div>
                                <div class="wrapper1 mt-10">
                                    <div class="circle1"></div>
                                    <div class="circle1"></div>
                                    <div class="circle1"></div>
                                    <div class="shadow1"></div>
                                    <div class="shadow1"></div>
                                    <div class="shadow1"></div>
                                </div>
                            </div>
                        </a>
                        <a class="bg-yellow-600 shadow-2xl rounded-md" href="{{ route('admin.products.index') }}">
                            <div>
                                <div class="flex justify-center">
                                    <span class="font-alatsi text-2xl">Productos</span>
                                </div>
                                <div class="wrapper1 mt-10">
                                    <div class="circle1"></div>
                                    <div class="circle1"></div>
                                    <div class="circle1"></div>
                                    <div class="shadow1"></div>
                                    <div class="shadow1"></div>
                                    <div class="shadow1"></div>
                                </div>
                            </div>
                        </a>
                        <a class="bg-red-600 shadow-2xl rounded-md" href="{{ route('users.index') }}">
                            <div>
                                <div class="flex justify-center">
                                    <span class="font-alatsi text-2xl">Pagos</span>
                                </div>
                                <div class="wrapper1 mt-10">
                                    <div class="circle1"></div>
                                    <div class="circle1"></div>
                                    <div class="circle1"></div>
                                    <div class="shadow1"></div>
                                    <div class="shadow1"></div>
                                    <div class="shadow1"></div>
                                </div>
                            </div>
                        </a>
                        <a class="bg-green-600 shadow-2xl rounded-md" href="{{ route('users.index') }}">
                            <div>
                                <div class="flex justify-center">
                                    <span class="font-alatsi text-2xl">Imports / Exports</span>
                                </div>
                                <div class="wrapper1 mt-10">
                                    <div class="circle1"></div>
                                    <div class="circle1"></div>
                                    <div class="circle1"></div>
                                    <div class="shadow1"></div>
                                    <div class="shadow1"></div>
                                    <div class="shadow1"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection



{{--@extends('Layouts.dashboard')--}}

{{--@section('content')--}}
{{--<div class="flex justify-center mt-10">--}}
{{--    <div class="bg-zinc-900 flex flex-col justify-center items-center rounded-md px-10 py-10 grid grid-cols-2">--}}
{{--        <div>--}}
{{--            <span class="text-white font-alatsi text-center text-6xl mb-5 text-center"><h1>My profile</h1></span>--}}
{{--            <x-user-card></x-user-card>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <span class="font-alatsi text-2xl text-white">Name: <span class="text-gray-300">{{ auth()->user()->name }}</span></span><br>--}}
{{--            <span class="font-alatsi text-2xl text-white">Email: <span class="text-gray-300">{{ auth()->user()->email }}</span></span><br>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--@endsection--}}


{{--@extends('Layouts.dashboard')--}}

{{--@section('content')--}}
{{--    <h1 class="text-white font-alatsi bg-constellation text-center text-6xl mt-5">Panel</h1>--}}

{{--    <div class="flex justify-center items-center my-10">--}}
{{--        <div class="bg-zinc-800 flex flex-col justify-center items-center rounded-md py-5 px-5 hover:scale-110 duration-100">--}}
{{--                <a href="{{ route('users.index') }}">--}}
{{--            <span class="text-gray-500 font-alatsi text-center text-4xl mb-5"><h1>Users Table</h1></span>--}}
{{--            <span class="text-white font-alatsi text-center">You can activate, deactivate and delete users in this section</span>--}}
{{--                </a>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="flex justify-center items-center my-10">--}}
{{--        <div class="bg-zinc-800 flex flex-col justify-center items-center rounded-md py-5 px-5 hover:scale-110 duration-100">--}}
{{--                <a href="{{ route('admin.products.index') }}">--}}
{{--            <span class="text-gray-500 font-alatsi text-center text-4xl mb-5"><h1>Products Table</h1></span>--}}
{{--            <span class="text-white font-alatsi text-center">You can create, edit, deactivate and delete products in this section</span>--}}
{{--                </a>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--@endsection--}}
