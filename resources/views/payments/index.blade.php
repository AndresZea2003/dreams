@extends('Layouts.app')

@section('main')
    <div class="bg-neutral-400 min-h-full">
        <x-nav></x-nav>
        <div class="flex justify-center  gap-5 bg-neutral-400">
            <div class="">
                <payments-table :payments="{{ json_encode($payments) }}" :count="{{ $count }}"></payments-table>
            </div>
        </div>
    </div>
    </div>
@endsection

{{--@extends('Layouts.app')--}}

{{--@section('main')--}}
{{--<div class="bg-gray-200 h-full w-full">--}}
{{--        <nav class="bg-gray-200 container mx-auto px-5 py-2 flex grid grid-cols-3 shadow-2xl">--}}
{{--            <div class="col-span-2">--}}
{{--            <a href="{{ route('home') }}" class="font-fugaz-one text-black hover:text-gray-400 text-6xl">Dreams</a>--}}
{{--            </div>--}}
{{--            <div class="text-right">--}}
{{--            <dropdown name='{{ auth()->user()->name }}' profile-route="{{ route('profile') }}" products-route="{{ route('products.index') }}" payments-route="{{ route('payments.index') }}" panel-route="{{ auth()->user()->hasRole('admin') ? route('panel') : null }}"></dropdown>--}}
{{--            </div>--}}
{{--        </nav>--}}

{{--    <div class="flex flex-col justify-center items-center">--}}
{{--        <payments-table :payments="{{ json_encode($payments) }}" :count="{{ $count }}"></payments-table>--}}
{{--    </div>--}}
{{--</div>--}}

{{--@endsection--}}


