@extends('Layouts.app')

@section('main')
<div class="h-full w-full bg-constellation">
    <nav class="bg-zinc-900 text-6xl flex justify-between">
    <a href="{{ route('home') }}" class="font-fugaz-one text-gray-400 hover:text-white my-2 ml-5">Dreams</a>
    <dropdown class="pr-2" name='{{ auth()->user()->name }}' profile-route="{{ route('profile') }}" panel-route="{{ auth()->user()->hasRole('admin') ? route('panel') : null }}"></dropdown>
    </nav>
    @yield('content')
</div>

@endsection
