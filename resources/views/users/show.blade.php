@extends('layouts.app')

@section('content')
        @include('foods.foods', ['foods' => $foods])
        {!! link_to_route('foods.create', '食事内容の登録') !!}
@endsection