@extends('Layouts.app')

@section('main')
    <div class="bg-neutral-400 min-h-full">
        <x-nav></x-nav>
        <div class="flex justify-center pt-10 gap-5 bg-neutral-400">
            <div>
                <div class="bg-gray-300 p-10 shadow-2xl rounded-md">
                    <div class="flex flex-col items-center">
                        <img
                            class="h-20 w-20 rounded-full"
                            :src="`https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=eed09d&color=000&size=50&bold=true`"
                            alt="Avatar"
                        />
                        <div class="flex flex-col items-center pt-2 gap-2">
                            <span class="text-xl">
                            <span class="font-alatsi">Nombre: </span>
                            {{ auth()->user()->name }}
                        </span>
                            <span class="text-xl">
                            <span class="font-alatsi">Email: </span>
                            {{ auth()->user()->email }}
                        </span>
                            <span class="text-xl">
                            <span class="font-alatsi">Fecha de creacion: </span>
                            {{ auth()->user()->created_at }}
                        </span>
                            <span class="text-xl">
                            <span class="font-alatsi">Fecha de verificacion: </span>
                            {{ auth()->user()->email_verified_at }}
                        </span>
                        </div>
                        <div class="loader mt-10">
                            <div class="loader-square"></div>
                            <div class="loader-square"></div>
                            <div class="loader-square"></div>
                            <div class="loader-square"></div>
                            <div class="loader-square"></div>
                            <div class="loader-square"></div>
                            <div class="loader-square"></div>
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
