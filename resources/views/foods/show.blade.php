@extends('layouts.app')

@section('content')

    <h2>{{ $food->eat_date }} に食べた食事内容の詳細ページ</h2>
    <div class="row">
        <div class="col-xs-5">    
            <table class="table table-bordered">
                    <tr>
                        <th>食べた日</th>
                        <td>{{ $food->eat_date }}</td>
                    </tr>
                    <tr>
                        <th>メニュー</th>
                        <td>{{ $food->name }}</td>
                    </tr>
                    <tr>
                        <th>カロリー(kcal)</th>
                        <td>{{ $food->calorie }}</td>
                    </tr>
            </table>
        </div>
    </div>
    
    {!! link_to_route('foods.edit', 'この食事内容を編集', ['id' => $food->id], ['class' => 'btn btn-default']) !!}
    
    {!! Form::model($food, ['route' => ['foods.destroy', $food->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    

@endsection

