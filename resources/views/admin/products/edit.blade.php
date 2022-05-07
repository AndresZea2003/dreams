@extends('Layouts.app')

@section('main')
    <div class="bg-neutral-400 min-h-full flex justify-center items-center">
        {{--        <x-nav></x-nav>--}}
        <div class="flex justify-center  gap-5 bg-neutral-400">
            <div class="">
                <div class="bg-neutral-800 p-10 my-10 shadow-2xl rounded-md">
                    <form action="{{ route('admin.products.update', $product) }}" method="POST"
                          enctype="multipart/form-data"
                          class="w-full max-w-lg">
                        @method('PATCH')
                        @csrf
                        <div class="flex justify-center">
                            <span class="text-white font-alatsi text-2xl text">
                            Crea un nuevo producto
                            </span>
                        </div>
                        <div class="flex flex-wrap -mx-3 my-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                                       for="grid-first-name">
                                    Name
                                </label>
                                <input
                                    class="appearance-none block w-full bg-white text-black border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    name="name" id="name" type="text" placeholder="Product Name"
                                    value="{{ $product['name'] }}">
                                @error('name')
                                <p class="text-red-500 text-xs italic">Please choose a name</p>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                                       for="grid-first-name">
                                    Price
                                </label>
                                <input
                                    class="appearance-none block w-full bg-white text-black border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    name="price" id="price" type="number" placeholder="$100"
                                    value="{{ $product['price'] }}">
                                @error('price')
                                <p class="text-red-500 text-xs italic">The price is required</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                                       for="grid-password">
                                    Description
                                </label>
                                <input
                                    class="appearance-none block w-full bg-white text-black border border-white rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-white"
                                    name="description" id="description" type="text"
                                    placeholder="Product description example" value="{{ $product['description'] }}">
                                @error('description')
                                <p class="text-red-500 text-xs italic">Please choose a description</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-2">
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                                       for="grid-city">
                                    Available
                                </label>
                                <input type="number" name="available"
                                       class="appearance-none block w-full bg-white text-black border border-white rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-white"
                                       placeholder="15" value="{{ $product['available'] }}">
                                @error('available')
                                <p class="text-red-500 text-xs italic">The available is required</p>
                                @enderror
                            </div>
                            <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                                <div>
                                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                                           for="grid-city">
                                        Photo ( Opcional )
                                    </label>
                                    <input class="py-2 px-2 bg-gray-100 rounded-md" type="file" name="photo">
                                </div>
                            </div>
                            {{--                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">--}}
                            {{--                                <button--}}
                            {{--                                    type="submit"--}}
                            {{--                                    class="inline-flex items-center rounded-md border border-transparent bg-green-600 mt-6 ml-3 px-5 py-2 text-base font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"--}}
                            {{--                                >--}}
                            {{--                                    Create--}}
                            {{--                                </button>--}}
                            {{--                            </div>--}}
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            </div>
                            <div class="w-full md:w-100 px-3 mb-6 md:mb-0 flex justify-between">
                                <a href="{{ route('admin.products.index') }}">
                                    <button
                                        class="inline-flex items-center rounded-md border border-transparent bg-red-600 mt-6 ml-3 px-5 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                                    >
                                        Cancel
                                    </button>
                                </a>

                                <button
                                    type="submit"
                                    class="inline-flex items-center rounded-md border border-transparent bg-green-600 mt-6 ml-3 px-5 py-2 text-base font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                                >
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

{{--@extends('Layouts.dashboard')--}}

{{--@section('content')--}}

{{--<div class="flex justify-center">--}}
{{--    <div class="bg-zinc-800 px-5 py-5 my-10">--}}
{{--        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="w-full max-w-lg">--}}
{{--            @csrf--}}
{{--            <span class="text-white font-alatsi text-2xl">--}}
{{--                Crete a new product--}}
{{--            </span>--}}
{{--            <div class="flex flex-wrap -mx-3 my-6">--}}
{{--                <div>--}}
{{--                    <input type="file" name="photo">--}}
{{--                </div>--}}
{{--                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">--}}
{{--                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-first-name">--}}
{{--                    Name--}}
{{--                    </label>--}}
{{--                    <input class="appearance-none block w-full bg-white text-black border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="name" id="name" type="text" placeholder="Product Name" value="{{ old('name') }}">--}}
{{--                    @error('name')--}}
{{--                        <p class="text-red-500 text-xs italic">Please choose a name</p>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">--}}
{{--                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-first-name">--}}
{{--                    Price--}}
{{--                    </label>--}}
{{--                    <input class="appearance-none block w-full bg-white text-black border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="price" id="price" type="number" placeholder="$100" value="{{ old('price') }}">--}}
{{--                    @error('price')--}}
{{--                        <p class="text-red-500 text-xs italic">The price is required</p>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="flex flex-wrap -mx-3 mb-6">--}}
{{--                <div class="w-full px-3">--}}
{{--                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-password">--}}
{{--                    Description--}}
{{--                    </label>--}}
{{--                    <input class="appearance-none block w-full bg-white text-black border border-white rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-white" name="description" id="description" type="text" placeholder="Product description example" value="{{ old('description') }}">--}}
{{--                    @error('description')--}}
{{--                        <p class="text-red-500 text-xs italic">Please choose a description</p>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="flex flex-wrap -mx-3 mb-2">--}}
{{--                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">--}}
{{--                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-city">--}}
{{--                    Available--}}
{{--                    </label>--}}
{{--                    <input type="number" name="available" class="appearance-none block w-full bg-white text-black border border-white rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-white" placeholder="15" value="{{ old('available') }}">--}}
{{--                    @error('available')--}}
{{--                        <p class="text-red-500 text-xs italic">The available is required</p>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">--}}

{{--                </div>--}}
{{--                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">--}}
{{--                    <button--}}
{{--                    type="submit"--}}
{{--                    class="inline-flex items-center rounded-md border border-transparent bg-green-600 mt-6 ml-3 px-5 py-2 text-base font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"--}}
{{--                    >--}}
{{--                    Create--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}


{{--@extends('Layouts.dashboard')--}}

{{--@section('content')--}}
{{--<div class="flex justify-center">--}}
{{--    <div class="bg-zinc-800 px-5 py-5 my-10">--}}
{{--        <form action="{{ route('admin.products.update', $product) }}" method="POST" class="w-full max-w-lg">--}}
{{--            @csrf--}}
{{--            @method('PATCH')--}}
{{--            <span class="text-white font-alatsi text-2xl">--}}
{{--                Edit product #{{ $product['id'] }}--}}
{{--            </span>--}}
{{--            <div class="flex flex-wrap -mx-3 my-6">--}}
{{--                <div>--}}
{{--                    <input type="file" name="photo">--}}
{{--                </div>--}}
{{--                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">--}}
{{--                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-first-name">--}}
{{--                    Name--}}
{{--                    </label>--}}
{{--                    <input class="appearance-none block w-full bg-white text-black border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="name" id="name" type="text" placeholder="Product Name" value="{{ $product['name'] }}">--}}
{{--                    @error('name')--}}
{{--                        <p class="text-red-500 text-xs italic">Please choose a name</p>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">--}}
{{--                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-first-name">--}}
{{--                    Price--}}
{{--                    </label>--}}
{{--                    <input class="appearance-none block w-full bg-white text-black border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="price" id="price" type="number" placeholder="$100" value="{{ $product['price'] }}">--}}
{{--                    @error('price')--}}
{{--                        <p class="text-red-500 text-xs italic">The price is required</p>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="flex flex-wrap -mx-3 mb-6">--}}
{{--                <div class="w-full px-3">--}}
{{--                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-password">--}}
{{--                    Description--}}
{{--                    </label>--}}
{{--                    <input class="appearance-none block w-full bg-white text-black border border-white rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-white" name="description" id="description" type="text" placeholder="Product description example" value="{{ $product['description'] }}">--}}
{{--                    @error('description')--}}
{{--                        <p class="text-red-500 text-xs italic">Please choose a description</p>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="flex flex-wrap -mx-3 mb-2">--}}
{{--                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">--}}
{{--                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-city">--}}
{{--                    Quantity--}}
{{--                    </label>--}}
{{--                    <input class="appearance-none block w-full bg-white text-black border border-white rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-white" name="quantity" id="quantity" type="number" placeholder="15" value="{{ $product['quantity'] }}">--}}
{{--                    @error('quantity')--}}
{{--                        <p class="text-red-500 text-xs italic">The quantity is required</p>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <button--}}
{{--                        type="submit"--}}
{{--                        class="inline-flex items-center rounded-md border border-transparent bg-green-600 mt-6 ml-3 px-5 py-2 text-base font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"--}}
{{--                        >--}}
{{--                        Save--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}
