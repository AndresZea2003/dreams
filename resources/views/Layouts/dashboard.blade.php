@extends('Layouts.app')

@section('main')
<div class="min-h-full w-full bg-constellation">
    <div class="bg-zinc-900">
        <nav class="container mx-auto px-5 py-2 flex grid grid-cols-3">
            <div class="col-span-2">
            <a href="{{ route('home') }}" class="font-fugaz-one text-gray-400 hover:text-white text-6xl">Dreams</a>
            </div>
            <div class="text-right">
            <dropdown name='{{ auth()->user()->name }}' profile-route="{{ route('profile') }}" products-route="{{ route('products.index') }}" payments-route="{{ route('payments.index') }}" panel-route="{{ auth()->user()->hasRole('admin') ? route('panel') : null }}"></dropdown>
            </div>

        </nav>
    </div>
    @yield('content')
</div>

@endsection
