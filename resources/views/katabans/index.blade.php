@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>{!! link_to_route('katabans.create', 'Add Model') !!}</h1>
                    
                    @foreach ($katabans as $kataban)
                        <p>{!! 'ID:'.$kataban->id.'/'.$kataban->kataban !!}</p>
                        <p>定格電圧 : {!! $kataban->rated_voltage !!}</p>
                        <p>Fan Class1 : {!! $kataban->fan_kbn1->fan_kbn1 !!}</p>
                        <p>Rev : {!! $kataban->revision !!}</p>
                        <p>Status : {!! $kataban->status->status !!}</p>
                        @if(isset($kataban->application_at))
                            <p>作成 : {!! $kataban->application_at !!}</p>
                        @else
                            <p>作成：未指定</p>
                        @endif
                        @if(isset($kataban->application_user->name))
                            <p>作成者 : {!! $kataban->application_user->name !!}</p>
                        @else
                            <p>作成者：未指定</p>
                        @endif
                        @if(isset($kataban->confirmed_at))
                            <p>確認 : {!! $kataban->confirmed_at !!}</p>
                        @else
                            <p>確認：未指定</p>
                        @endif
                        @if(isset($kataban->confirmed_user->name))
                            <p>確認者 : {!! $kataban->confirmed_user->name !!}</p>
                        @else
                            <p>確認者：未指定</p>
                        @endif
                        @if(isset($kataban->approval_at))
                            <p>承認 : {!! $kataban->approval_at !!}</p>
                        @else
                            <p>承認 :未指定</p>
                        @endif
                        @if(isset($kataban->approval_user->name))
                            <p>承認者 : {!! $kataban->approval_user->name !!}</p>
                        @else
                            <p>承認者 :未指定</p>
                        @endif
                        <p>Create : {!! $kataban->created_at !!}</p>
                        <p>Update : {!! $kataban->updated_at !!}</p>
                        
                        <p>{!! link_to_route('katabans.items', 'Inspection Items', ['id' => $kataban->id]) !!}</p>
                        {!! Form::model($kataban, ['route' => ['katabans.application', $kataban->id], 'method' => 'put','class' => 'form-horizontal']) !!}
                            {!! Form::submit('作成完了', ['class' => 'btn btn-warning']) !!}
                        {!! Form::close() !!}
                        {!! Form::model($kataban, ['route' => ['katabans.confirmed', $kataban->id], 'method' => 'put','class' => 'form-horizontal']) !!}
                            {!! Form::submit('確認完了', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                        {!! Form::model($kataban, ['route' => ['katabans.approval', $kataban->id], 'method' => 'put','class' => 'form-horizontal']) !!}
                            {!! Form::submit('承認完了', ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}
                        {!! Form::model($kataban, ['route' => ['katabans.back', $kataban->id], 'method' => 'put','class' => 'form-horizontal']) !!}
                            {!! Form::submit('差し戻し', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
