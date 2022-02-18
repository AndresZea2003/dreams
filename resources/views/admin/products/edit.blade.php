@extends('Layouts.dashboard')

@section('content')
<div class="flex justify-center">
    <div class="bg-zinc-800 px-5 py-5 my-10">
        <form action="{{ route('admin.products.update', $product) }}" method="POST" class="w-full max-w-lg">
            @csrf
            @method('PATCH')
            <span class="text-white font-alatsi text-2xl">
                Edit product #{{ $product['id'] }}
            </span>
            <div class="flex flex-wrap -mx-3 my-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-first-name">
                    Name
                    </label>
                    <input class="appearance-none block w-full bg-white text-black border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="name" id="name" type="text" placeholder="Product Name" value="{{ $product['name'] }}">
                    @error('name')
                        <p class="text-red-500 text-xs italic">Please choose a name</p>
                    @enderror
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-first-name">
                    Price
                    </label>
                    <input class="appearance-none block w-full bg-white text-black border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="price" id="price" type="number" placeholder="$100" value="{{ $product['price'] }}">
                    @error('price')
                        <p class="text-red-500 text-xs italic">The price is required</p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-password">
                    Description
                    </label>
                    <input class="appearance-none block w-full bg-white text-black border border-white rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-white" name="description" id="description" type="text" placeholder="Product description example" value="{{ $product['description'] }}">
                    @error('description')
                        <p class="text-red-500 text-xs italic">Please choose a description</p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-city">
                    Quantity
                    </label>
                    <input class="appearance-none block w-full bg-white text-black border border-white rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-white" name="quantity" id="quantity" type="number" placeholder="15" value="{{ $product['quantity'] }}">
                    @error('quantity')
                        <p class="text-red-500 text-xs italic">The quantity is required</p>
                    @enderror
                </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    </div>
                    <div>
                        <button
                        type="submit"
                        class="inline-flex items-center rounded-md border border-transparent bg-green-600 mt-6 ml-3 px-5 py-2 text-base font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                        >
                        Save
                        </button>
                    </div>
            </div>
        </form>
    </div>
</div>
@endsection
