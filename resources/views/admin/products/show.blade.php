@extends('Layouts.dashboard')

@section('content')
<a href="{{ route('admin.products.index') }}">
   <button
       type="submit"
       class="inline-flex items-center rounded-md border border-transparent bg-zinc-600 pl-4 py-2 text-base font-medium text-white shadow-sm hover:bg-zinc-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
       >
       <rewind-icon class="-ml-1 mr-3 h-5 w-5" aria-hidden="true" />
   </button>
</a>
<div class="flex justify-center mt-10">
    <div class="bg-zinc-900 flex flex-col rounded-md px-10 py-10 ">
        <div>
            <span class="text-white font-alatsi text-6xl mb-5"><h1>{{ $product['name'] }}</h1></span>
        </div>
        <div class="mt-10">
            <span class="font-alatsi text-2xl text-white">Name: <span class="text-gray-300">{{ $product['name'] }}</span></span><br>
            <span class="font-alatsi text-2xl text-white">Price: $<span class="text-gray-300">{{ $product['price'] }}</span></span><br>
            <span class="font-alatsi text-2xl text-white">Description: <span class="text-gray-300">{{ $product['description'] }}</span></span><br>
            <span class="font-alatsi text-2xl text-white">Quantity: <span class="text-gray-300">{{ $product['quantity'] }}</span></span><br>
        </div>
    </div>
    <x-product-card name="{{ $product['name'] }}" price="{{ $product['price'] }}" description="{{ $product['description'] }}" quantity="{{ $product['quantity'] }}"></x-product-card>
</div>



@endsection
