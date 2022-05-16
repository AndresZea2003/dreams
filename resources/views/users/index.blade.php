@extends('Layouts.app')

@section('main')
    <div class="bg-neutral-400 min-h-full">
        <x-nav></x-nav>
        <div class="flex justify-center  gap-5 bg-neutral-400">
            <div class="mt-10">
                <users-table :users="{{json_encode($users['data'])}}" :current="{{ auth()->user()->id }}"></users-table>
                <div class="flex justify-center mt-5">{!! $links !!}</div>
            </div>
        </div>
    </div>
    </div>
@endsection

{{--@extends('Layouts.dashboard')--}}

{{--@section('content')--}}
{{--    <users-table :users="{{json_encode($users['data'])}}" :current="{{ auth()->user()->id }}"></users-table>--}}
{{--    <div class="flex justify-center mt-5">{!! $links !!}</div>--}}
{{--@endsection--}}
