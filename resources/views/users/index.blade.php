@extends('Layouts.dashboard')

@section('content')
        <users-table :users="{{json_encode($users['data'])}}" :current="{{ auth()->user()->id }}"></users-table>
    <div class="flex justify-center mt-5">{!! $links !!}</div>
@endsection
