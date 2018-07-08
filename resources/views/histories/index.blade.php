@extends('layouts.app')

@section('content')
    <h2>履歴一覧ページ</h2>
    <div class="row">
        <div class="col-xs-10">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>履歴登録日時</th>
                        <th>ユーザ名</th>
                        <th>開始日</th>
                        <th>終了日</th>
                        <th>合計摂取カロリー(kcal)</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($histories as $history)
                    <tr>
                        <td>{{ $history->created_at }}</td>
                        <td>{{ $history->user_name }}</td>
                        <td>{{ $history->start_date }}</td>
                        <td>{{ $history->end_date }}</td>
                        <td>{{ $history->calorie }}</td>
                        <td>
                            {!! Form::model($history, ['route' => ['histories.destroy', $history->id], 'method' => 'delete']) !!}
                                {!! Form::submit('削除') !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection