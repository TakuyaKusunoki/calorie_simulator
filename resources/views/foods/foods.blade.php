@section('content')
    <h2>食事内容一覧</h2>
    {!! link_to_route('foods.create', '食事内容の登録', null, ['class' => 'btn btn-primary']) !!}

     @if (count($foods) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>食べた日</th>
                    <th>メニュー</th>
                    <th>カロリー(kcal)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($foods as $food)
                    <tr>
                        <td>{!! link_to_route('foods.show', $food->eat_date, ['id' => $food->id]) !!}</td>
                        <td>{{ $food->name }}</td>
                        <td>{{ $food->calorie }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    

@endsection