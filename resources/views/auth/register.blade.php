@extends('layouts.app')

@section('main')
<div class="flex flex-col justify-center items-center h-full bg-constellation">
    <div class="w-full max-w-xs">
        <form class="bg-zinc-800 shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('register') }}" method="POST">
            @csrf
          <div class="mb-4">
            <label class="block text-gray-300 text-sm font-bold mb-2" for="username">
              Username
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text"  name="name" value="{{ old('name') }}" placeholder="Name...">
          </div>
          <div class="mb-4">
            <label class="block text-gray-300 text-sm font-bold mb-2">
              Email
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" name="email" value="{{ old('email') }}" placeholder="Email">
          </div>
          <div class="mb-6">
            <label class="block text-gray-300 text-sm font-bold mb-2" for="password">
            Password
            </label>
            <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="password">
            </div>
            <div class="mb-6">
                <label class="block text-gray-300 text-sm font-bold mb-2" for="password">
                 Password Confirmation
                </label>
                <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password_confirmation" type="password" placeholder="password">
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-red-300 hover:opacity-80 text-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="register">
                Register
                </button>
                <a class="inline-block align-baseline font-bold text-sm text-gray-500 hover:text-white pl-5" href="{{route('login')}}">
                do you already have an account?
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
        &copy;Dreams Corporation
        </p>
    </div>
</div>
@endsection
