@extends('Layouts.dashboard')

@section('content')
    <h1 class="text-white font-alatsi bg-constellation text-center text-6xl mt-5">Panel</h1>

    <div class="flex justify-center items-center my-10">
        <div class="bg-zinc-800 flex flex-col justify-center items-center rounded-md py-5 px-5 hover:scale-110 duration-100">
                <a href="{{ route('users.index') }}">
            <span class="text-gray-500 font-alatsi text-center text-4xl mb-5"><h1>Users Table</h1></span>
            <span class="text-white font-alatsi text-center">You can activate, deactivate and delete users in this section</span>
                </a>
        </div>
    </div>

    <div class="flex justify-center items-center my-10">
        <div class="bg-zinc-800 flex flex-col justify-center items-center rounded-md py-5 px-5 hover:scale-110 duration-100">
                <a href="{{ route('admin.products.index') }}">
            <span class="text-gray-500 font-alatsi text-center text-4xl mb-5"><h1>Products Table</h1></span>
            <span class="text-white font-alatsi text-center">You can create, edit, deactivate and delete products in this section</span>
                </a>
        </div>
    </div>

@endsection
