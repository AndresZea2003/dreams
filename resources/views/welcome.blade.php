@extends('Layouts.app')

@section('main')
    <div class="flex flex-col justify-center items-center h-full bg-gray-300">
        Welcome to Dreams...
            <div class="mt-5">
                <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mx-5">
                    <a href="{{ route(('login')) }}">
                        Login
                    </a>
                </button>
                <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mx-5">
                    <a href="{{ route(('register')) }}">
                        Register
                    </a>
                </button>
            </div>
    </div>
@endsection
