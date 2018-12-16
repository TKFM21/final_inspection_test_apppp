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

                    <h1>{!! link_to_route('role.create', 'Add role') !!}</h1>
                    
                    @foreach ($roles as $role)
                        <p>{!! 'ID:'.$role->id.'/'.$role->role !!}</p>
                        <p>Priority : {!! $role->priority !!}</p>
                        <p>Create : {!! $role->created_at !!}</p>
                        <p>Update : {!! $role->updated_at !!}</p>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
