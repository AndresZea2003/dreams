@extends('Layouts.app')

@section('main')
    <div class="bg-neutral-400 min-h-full">
        <x-nav></x-nav>
        <div class="flex justify-center  gap-5 bg-neutral-400">
            <div class="">
                <products-table></products-table>
            </div>
        </div>
    </div>
    </div>
@endsection
