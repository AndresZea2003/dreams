@extends('layouts.app')

@section('main')
<div class="flex flex-col justify-center items-center h-full bg-gray-300">
    <div class="text-5xl mb-5">
        Verify your email
    </div>
    <p class="text-xl">
        @if (session('status') == 'verification-link-sent')
            A new email verification link has been emailed to you!
        @else
            To access the page you must verify your email
        @endif
    </p>
    <div class="bg-gray-200 px-5 py-5">
        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mx-5" type="submit" form="email-verification">
            Resend verification email
        </button>
        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mx-5" type="submit" form="logout">
            Logout
        </button>
            <form id="logout" action="{{route('logout')}}" method="POST">@csrf</form>
            <form id="email-verification" action="{{route('verification.send')}}" method="POST">@csrf</form>
    </div>
</div>
@endsection
