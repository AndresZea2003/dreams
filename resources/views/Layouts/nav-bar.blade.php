@extends('Layouts.app')

@section('main')
<nav class="bg-gray-500 text-6xl flex justify-between">
    <a href="{{ route('home') }}">Dreams</a>
    <dropdown name='{{ auth()->user()->name }}' profile-route="{{ route('profile') }}" panel-route="{{ auth()->user()->hasRole('admin') ? route('panel') : null }}"></dropdown>
</nav>
@yield('content')
@endsection
