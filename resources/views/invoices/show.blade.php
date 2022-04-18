@extends('Layouts.app')

@section('main')
<div class="bg-gray-200 h-full w-full flex flex-col justify-center items-center">

    <invoice-cart invoice="{{ $invoice }}" user_id="{{ auth()->user()->id }}"></invoice-cart>

</div>





@endsection
