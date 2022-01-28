@extends('layouts.app')

@section('main')
<div class="flex flex-col justify-center items-center h-full bg-gray-300">
    <form action="{{ route('login') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
            Email
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" id="username" value="{{ old('email') }}" type="text" placeholder="Username">
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
            Password
            </label>
            <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="password" id="password" type="password" placeholder="******************">
            <p class="text-red-500 text-xs italic">Please choose a password.</p>
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="login">
            Login
            </button>
            <a class="inline-block align-baseline font-bold text-sm text-gray-500 hover:text-gray-800" href="#">
            Forgot Password?
            </a>
        </div>
    </form>
        <p class="text-center text-gray-500 text-xs">
        &copy; Dreams Corporation
        </p>
</div>

  @error('email')
          @enderror

  @error('password')
    @enderror

@endsection
