@extends('Layouts.app')

@section('main')
<div class="h-full w-full bg-constellation">
    <div class="bg-zinc-900">
        <nav class="container mx-auto flex justify-between px-5 py-2 grid-cols-3">
            <a href="{{ route('home') }}" class="font-fugaz-one text-gray-400 hover:text-white text-6xl">Dreams</a>

            <dropdown name='{{ auth()->user()->name }}' profile-route="{{ route('profile') }}" products-route="{{ route('products.index') }}" panel-route="{{ auth()->user()->hasRole('admin') ? route('panel') : null }}"></dropdown>
        </nav>
    </div>
    @yield('content')
</div>

@endsection
