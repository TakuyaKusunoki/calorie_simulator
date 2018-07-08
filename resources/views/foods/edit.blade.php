@extends('layouts.app')

@section('content')
    <h2>{{ $food->eat_date }} に食べた食事内容編集ページ</h2>
    <div class="row">
        <div class="col-xs-4">
    
        {!! Form::model($food, ['route' => ['foods.update', $food->id], 'method' => 'put']) !!}
    
            <div class="form-group">
                {!! Form::label('name', 'メニュー') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                
                {!! Form::label('calorie', 'カロリー(kcal)') !!}
                {!! Form::number('calorie', null, ['class' => 'form-control']) !!}
                
                {!! Form::label('eat_date', '食べた日時') !!}
                {!! Form::text('eat_date', null, ['class' => 'form-control', 'placeholder' => '例2018/07/03']) !!}
        
                {!! Form::submit('更新', ['class' => 'btn btn-warning']) !!}
            </div>
        </div>
    </div>
    
        {!! Form::close() !!}

@endsection