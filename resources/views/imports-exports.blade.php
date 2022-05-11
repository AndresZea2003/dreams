@extends('Layouts.app')

@section('main')
    <div class="bg-neutral-400 min-h-full">
        <x-nav></x-nav>
        <div class="flex justify-center pt-10 gap-5 bg-neutral-400">
            <div>
                <div class="bg-gray-300 p-10 shadow-2xl rounded-md">
{{--                    <div class="flex flex-col items-center">--}}
{{--                        <span class="font-alatsi text-2xl">Panel Administrador</span>--}}
{{--                    </div>--}}
                    <div class="grid grid-cols-2 gap-10 mt-10">
                        <a class="bg-green-600  shadow-2xl rounded-md hover:text-white hover:scale-90 transition duration-300" href="{{ route('imports') }}">
                            <div>
                                <div class="flex flex-col justify-center items-center">
                                    <span class="font-alatsi text-2xl">Imports</span>
                                </div>
                            </div>
                        </a>
                       <a class="bg-green-600  shadow-2xl rounded-md hover:text-white hover:scale-90 transition duration-300" href="{{ route('users.index') }}">
                            <div>
                                <div class="flex flex-col justify-center items-center">
                                    <span class="font-alatsi text-2xl">Exports</span>
                                </div>
                            </div>
                        </a>
                        <a class="col-span-2 bg-green-600  shadow-2xl rounded-md hover:text-white hover:scale-90 transition duration-300" href="{{ route('users.index') }}">
                            <div>
                                <div class="flex flex-col justify-center items-center">
                                    <span class="font-alatsi text-2xl">Reportes</span>
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
