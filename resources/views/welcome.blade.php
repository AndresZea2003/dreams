@extends('Layouts.app')

@section('main')
    <div class="flex flex-col justify-center items-center h-full bg-constellation font-fugaz-one text-white text-4xl">
        Welcome to Dreams... <x-logo></x-logo>
            <div class="mt-5 bg-stars rounded-full px-10 py-10 font-alatsi">
                <button class="bg-zinc-800 hover:bg-opacity-90 text-2xl text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mx-5">
                    <a href="{{ route(('login')) }}">
                        Login
                    </a>
                </button>
                <button class="bg-zinc-800 hover:bg-opacity-90 text-2xl text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mx-5">
                    <a href="{{ route(('register')) }}">
                        Register
                    </a>
                </button>
            </div>
    </div>
@endsection
