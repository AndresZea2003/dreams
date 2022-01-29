@extends('Layouts.nav-bar')

@section('content')
<h1>Panel</h1>
    <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
        <a href="{{ route('users.index') }}">Users</a>
    </button>
@endsection
