@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-4">
        <h1>食事内容登録ページ</h1>
    
        {!! Form::model($food, ['route' => 'foods.store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'メニュー') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                
                {!! Form::label('calorie', 'カロリー(kcal)') !!}
                {!! Form::number('calorie', null, ['class' => 'form-control']) !!}
                
                {!! Form::label('eat_date', '食べた日時') !!}
                {!! Form::text('eat_date', null, ['class' => 'form-control', 'placeholder' => '例2018/07/03']) !!}
        
                {!! Form::submit('登録', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>
        {!! Form::close() !!}

@endsection