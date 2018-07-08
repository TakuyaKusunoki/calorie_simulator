@extends('layouts.app')
@section('content')
    @if (\Auth::user()->type == 'root')
        @include('users.users', ['users' => $users])
    @else
        @include('foods.foods', ['foods' => $foods])
    @endif
@endsection