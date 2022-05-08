@extends('Layouts.app')

@section('main')
    <div class="bg-neutral-400 min-h-full">
        <div>
            <x-nav></x-nav>
            <div class="flex justify-center py-10 gap-5 bg-neutral-400">
                <div>
                    <shopping-cart :user_id="{{ auth()->user()->id }}"></shopping-cart>
                </div>
            </div>
        </div>
    </div>

@endsection

