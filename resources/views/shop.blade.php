@extends('Layouts.app')

@section('main')
<x-nav></x-nav>
<shopping-cart :user_id="{{ auth()->user()->id }}"></shopping-cart>
@endsection

