@extends('Layouts.app')

@section('main')
<div class="flex flex-col justify-center items-center h-full bg-constellation">
    <div class="text-5xl text-white font-alatsi mb-5">
        Oh! , User Disabled
    </div>
    <span class="text-white">
        Your user has been deactivated, contact an administrator for a solution
    </span><br>
    <button class="bg-red-300 hover:opacity-80 text-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mx-5" type="submit" form="logout">
        Logout
    </button>
        <form id="logout" action="{{route('logout')}}" method="POST">@csrf</form>
</div>
@endsection
