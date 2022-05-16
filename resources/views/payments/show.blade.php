@extends('Layouts.app')

@section('main')
<div class="bg-gray-200 h-full w-full flex flex-col justify-center items-center">

<payment-cart payment="{{ $payment }}"></payment-cart>

</div>

@endsection
