@extends('Layouts.nav-bar')

@section('content')
     <users-table :users="{{json_encode($users['data'])}}" :current="{{ auth()->user()->id }}"></users-table>
@endsection
