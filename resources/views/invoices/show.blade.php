@extends('Layouts.app')

@section('main')
    <invoice-cart user="{{ auth()->user() }}" invoice="{{ $invoice }}" user_id="{{ auth()->user()->id }}"></invoice-cart>
@endsection
