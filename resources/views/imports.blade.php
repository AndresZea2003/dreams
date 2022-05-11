@extends('Layouts.app')

@section('main')
    <div class="flex flex-col justify-center items-center h-screen bg-neutral-900">
        <div class="bg-gray-200 rounded-md p-5 shadow-lg border border-black">
            <h1 class="text-3xl text-center font-bold">PRODUCTS IMPORT</h1><br>
            <form action="{{ route('imports') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="">
                    <p class="text-center">Ingrese el archivo</p><br>
                    <input type="file" name="todo"><br>

                    <div class="flex flex-col"><br>
                        <button
                            class="bg-zinc-800 hover:opacity-80 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit" value="login">
                            <input type="submit">
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
