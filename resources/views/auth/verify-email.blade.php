@extends('layouts.app')

@section('main')
<div class="flex flex-col justify-center items-center h-full bg-constellation">
    <div class="text-5xl text-white font-fugaz-one mb-5">
        Verify your email
    </div>
    <p class="text-xl text-white font-alatsi">
        @if (session('status') == 'verification-link-sent')
            A new email verification link has been emailed to you!
        @else
            To access the page you must verify your email
        @endif
    </p>
    <div class="bg-zinc-800 rounded px-5 py-5">
        <button class="bg-red-300 hover:opacity-80 text-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mx-5" type="submit" form="email-verification">
            Resend verification email
        </button>
        <button class="bg-red-300 hover:opacity-80 text-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mx-5" type="submit" form="logout">
            Logout
        </button>
            <form id="logout" action="{{route('logout')}}" method="POST">@csrf</form>
            <form id="email-verification" action="{{route('verification.send')}}" method="POST">@csrf</form>
    </div>
</div>
@endsection
