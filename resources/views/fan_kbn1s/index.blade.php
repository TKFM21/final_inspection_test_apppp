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

                    <h1>{!! link_to_route('fan_kbn1s.create', 'Add fan class1') !!}</h1>
                    
                    @foreach ($fankbn1s as $fankbn1)
                        <p>{!! 'ID:'.$fankbn1->id.'/'.$fankbn1->fan_kbn1 !!}</p>
                        <p>Create : {!! $fankbn1->created_at !!}</p>
                        <p>Update : {!! $fankbn1->updated_at !!}</p>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
