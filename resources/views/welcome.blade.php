@extends('Layouts.app')

@section('main')
    {{--    <div class="flex flex-col justify-center items-center h-full bg-constellation font-fugaz-one text-white text-4xl">--}}
    {{--        Welcome to Dreams... <x-logo></x-logo>--}}
    {{--            <div class="mt-5 bg-stars rounded-full px-10 py-10 font-alatsi">--}}
    {{--                <button class="bg-zinc-800 hover:bg-opacity-90 text-2xl text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mx-5">--}}
    {{--                    <a href="{{ route(('login')) }}">--}}
    {{--                        Login--}}
    {{--                    </a>--}}
    {{--                </button>--}}
    {{--                <button class="bg-zinc-800 hover:bg-opacity-90 text-2xl text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mx-5">--}}
    {{--                    <a href="{{ route(('register')) }}">--}}
    {{--                        Register--}}
    {{--                    </a>--}}
    {{--                </button>--}}
    {{--            </div>--}}
    {{--    </div>--}}

    <div class="flex flex-col justify-center items-center h-full bg-neutral-800 font-fugaz-one text-white text-4xl">
        <div class="spinner">
            <span>D</span>
            <span>R</span>
            <span>E</span>
            <span>A</span>
            <span>M</span>
            <span>S</span>
            <span><x-logo></x-logo></span>
        </div>
        <div class="mt-5 rounded-full px-10 py-10 font-alatsi">
            <a href="{{ route(('login')) }}">
                <buttonNice class="px-5 py-2 mx-5">
                    Login
                </buttonNice>
            </a>
            <a href="{{ route(('register')) }}">
                <buttonNice class="px-5 py-2 mx-5">
                    Register
                </buttonNice>
            </a>
        </div>
    </div>
@endsection
