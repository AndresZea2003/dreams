@extends('Layouts.dashboard')

@section('content')
<div class="flex justify-center mt-10">
    <div class="bg-zinc-900 flex flex-col justify-center items-center rounded-md px-10 py-10 grid grid-cols-2">
        <div>
            <span class="text-white font-alatsi text-center text-6xl mb-5 text-center"><h1>My profile</h1></span>
            <x-user-card></x-user-card>
        </div>
        <div>
            <span class="font-alatsi text-2xl text-white">Name: <span class="text-gray-300">{{ auth()->user()->name }}</span></span><br>
            <span class="font-alatsi text-2xl text-white">Email: <span class="text-gray-300">{{ auth()->user()->email }}</span></span><br>
        </div>
    </div>
</div>
@endsection
