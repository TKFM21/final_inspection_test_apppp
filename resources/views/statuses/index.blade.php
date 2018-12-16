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

                    <h1>{!! link_to_route('statuses.create', 'Add status') !!}</h1>
                    
                    @foreach ($statuses as $status)
                        <p>{!! 'ID:'.$status->id.'/'.$status->status !!}</p>
                        <p>Create : {!! $status->created_at !!}</p>
                        <p>Update : {!! $status->updated_at !!}</p>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
