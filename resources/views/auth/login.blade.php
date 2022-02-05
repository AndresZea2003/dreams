@extends('layouts.app')

@section('main')
<div class="flex flex-col justify-center bg-constellation items-center h-full">
    <form action="{{ route('login') }}" method="POST" class="bg-zinc-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
    @csrf
        <div class="mb-4">
            <label class="block text-gray-300 text-sm font-bold mb-2" for="username">
            Email
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" id="username" value="{{ old('email') }}" type="text" placeholder="example@email.com">
        </div>
        <div class="mb-6">
            <label class="block text-gray-300 text-sm font-bold mb-2" for="password">
            Password
            </label>
            <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="password" id="password" type="password" placeholder="password">
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-red-300 hover:opacity-80 text-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="login">
            Login
            </button>
            <a class="inline-block align-baseline font-bold text-sm text-gray-500 hover:text-white" href="/">
            Back to welcome
            </a>
        </div>
    </form>
    @error('email')
        <x-alert message="{{ $message }}" type="Error"></x-alert>
    @enderror
    @error('password')
        <x-alert message="{{ $message }}" type="Error"></x-alert>
    @enderror
        <p class="text-center text-gray-500 text-xs">
        &copy; Dreams Corporation
        </p>
</div>
@endsection
