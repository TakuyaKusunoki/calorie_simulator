@extends('layouts.app')

@section('content')
    <h2>計算結果ページ</h2>
    <div class="row">
        <div class="col-xs-10">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ユーザ名</th>
                        <th>開始日</th>
                        <th>終了日</th>
                        <th>合計摂取カロリー(kcal)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sum_calorie as $calorie)
                    <tr>
                        <td>{{ $calorie->name }}</td>
                        <td>{{ $start_date }}</td>
                        <td>{{ $end_date }}</td>
                        <td>{{ $calorie->sum }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h6>計算結果は、履歴に保存されました。</h6>
        </div>
    </div>
@endsection