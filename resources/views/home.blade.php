@extends('Layouts.app')

@section('main')
<div class="flex flex-col h-full bg-gray-300">
    <div class="bg-gray-500 text-6xl">
        <h1>Home</h1>
    </div>
    <div class="mt-5 ">
        <form action="{{route('logout')}}" method="POST">
            @csrf
            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="logout">
            Logout
            </button>
        </form>
    </div>
        {{ auth()->user() }}
</div>
@endsection
