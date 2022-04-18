@extends('Layouts.app')

@section('main')
<div class="bg-gray-200 h-full w-full">

        <nav class="bg-gray-200 container mx-auto px-5 py-2 flex grid grid-cols-3">
            <div class="col-span-2">
            <a href="{{ route('home') }}" class="font-fugaz-one text-black hover:text-gray-400 text-6xl">Dreams</a>
            </div>
        </nav>

    <div class="flex flex-col justify-center items-center">
        <payments-table :payments="{{ json_encode($payments['data']) }}"></payments-table>
    </div>
</div>






@endsection


