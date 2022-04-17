@extends('Layouts.dashboard')

@section('content')
<sub-nav :user_id="{{ auth()->user()->id }}"></sub-nav>
<shopping-cart :user_id="{{ auth()->user()->id }}"></shopping-cart>
@endsection

