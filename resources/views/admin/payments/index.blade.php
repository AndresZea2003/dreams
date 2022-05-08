@extends('Layouts.app')

@section('main')
    <div class="bg-neutral-400 min-h-full">
        <x-nav></x-nav>
        <div class="flex justify-center  gap-5 bg-neutral-400">
            <div class="">
                <payments-table :payments="{{ json_encode($payments) }}" :count="{{ $count }}" name="{{ json_encode($users) }}"></payments-table>
            </div>
        </div>
    </div>
    </div>
@endsection
