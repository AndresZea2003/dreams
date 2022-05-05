@extends('layouts.app')

@section('main')
    {{--<div class="flex flex-col justify-center bg-constellation items-center h-full">--}}
    {{--    <form action="{{ route('login') }}" method="POST" class="bg-zinc-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">--}}
    {{--    @csrf--}}
    {{--        <div class="mb-4">--}}
    {{--            <label class="block text-gray-300 text-sm font-bold mb-2" for="username">--}}
    {{--            Email--}}
    {{--            </label>--}}
    {{--            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" id="username" value="{{ old('email') }}" type="text" placeholder="example@email.com">--}}
    {{--        </div>--}}
    {{--        <div class="mb-6">--}}
    {{--            <label class="block text-gray-300 text-sm font-bold mb-2" for="password">--}}
    {{--            Password--}}
    {{--            </label>--}}
    {{--            <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="password" id="password" type="password" placeholder="password">--}}
    {{--        </div>--}}
    {{--        <div class="flex items-center justify-between">--}}
    {{--            <button class="bg-red-300 hover:opacity-80 text-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="login">--}}
    {{--            Login--}}
    {{--            </button>--}}
    {{--            <a class="inline-block align-baseline font-bold text-sm text-gray-500 hover:text-white" href="/">--}}
    {{--            Back to welcome--}}
    {{--            </a>--}}
    {{--        </div>--}}
    {{--    </form>--}}
    {{--    @error('email')--}}
    {{--        <x-alert message="{{ $message }}" type="Error"></x-alert>--}}
    {{--    @enderror--}}
    {{--    @error('password')--}}
    {{--        <x-alert message="{{ $message }}" type="Error"></x-alert>--}}
    {{--    @enderror--}}
    {{--        <p class="text-center text-gray-500 text-xs">--}}
    {{--        &copy; Dreams Corporation--}}
    {{--        </p>--}}
    {{--</div>--}}
    <div class="bg-neutral-800 h-full flex flex-col justify-center items-center">
        <div class="spinner">
            <span>L</span>
            <span>O</span>
            <span>G</span>
            <span>I</span>
            <span>N</span>
            <span><x-logo></x-logo></span>
        </div>
        <form action="{{ route('login') }}" method="POST" class="bg-zinc-800 shadow-2xl rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="input-group my-5">
                <input required="" autocomplete="off" class="input" name="email" id="email"
                       value="{{ old('email') }}" type="text">
                <label class="user-label">Email</label>
            </div>

            <div class="input-group my-5">
                <input required="" autocomplete="off" class="input" name="password" id="password"
                       value="{{ old('email') }}" type="password">
                <label class="user-label">Password</label>
            </div>
            <div class="flex justify-center">
                <div>
                    <button type="submit">
                        <buttonSend class="py-2 pr-5 hover:cursor-pointer">
                            <div class="svg-wrapper-1">
                                <div class="svg-wrapper">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path fill="currentColor"
                                              d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
                                    </svg>
                                </div>
                            </div>
                            <span class="font-bold">Login</span>
                        </buttonSend>
                    </button>
                    <div class="pt-5">
                        <a class="inline-block align-baseline font-bold text-sm text-gray-500 hover:text-white"
                           href="/">
                            Back to welcome
                        </a>
                    </div>
                </div>
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
