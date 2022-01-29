@extends('Layouts.nav-bar')

@section('content')
    <form action="{{route('logout')}}" method="POST">
        @csrf
        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 mt-5 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="logout">
        Logout
        </button>
    </form>
        {{ auth()->user()->hasRole('user') }}
@endsection
