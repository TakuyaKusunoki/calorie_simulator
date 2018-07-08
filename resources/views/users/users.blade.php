<h2>ユーザ一覧</h2>
@if (count($users) > 0)
    <div class="row">
        <div class="col-xs-6">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>ユーザ名</th>
                        <th>種別</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <?php $cnt = 1; ?>
                    {!! Form::open(['route' => 'calc.post']) !!}
                    @foreach ($users as $user)
                       @if ($user->type == 'user')
                           <tr>
                               <td>{!! Form::checkbox('userId['.$cnt.']', $user->id) !!}</td>
                               <td>{!! $user->name !!}</td>
                               <td>{!! $user->type !!}</td>
                               
                           </tr>
                       @endif
                    <?php $cnt++; ?>
                   @endforeach
                </tbody>
            </table>
                    
            <h3>合計摂取カロリーを計算する</h3>
            
            <div class="form-group">
                {!! Form::label('start_date', 'いつから') !!}
                {!! Form::text('start_date', null, ['class' => 'form-controll', 'placeholder' => '例:2018/07/01']) !!}
                
                {!! Form::label('end_date', 'いつまで') !!}
                {!! Form::text('end_date', null, ['class' => 'form-controll', 'placeholder' => '例:2018/07/31']) !!}
                
                {!! Form::submit('計算', ['class' => 'btn btn-warning'] ) !!}    
                
            {!! Form::close() !!}
            </div> 
        </div>
    </div>
@endif