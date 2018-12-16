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
                    
                    @foreach ($users as $user)
                        <p>{!! 'ID:'.$user->id.'/'.$user->code.'/'.$user->name !!}</p>
                        <p>Gender : {!! $user->gender->gender !!}</p>
                        <p>Email : {!! $user->email !!}</p>
                        <p>Department : {!! $user->department->department !!} /role : {!! $user->role->role !!}</p>
                        <p>Last Login : {!! $user->last_login_at !!}</p>
                        <p>Create : {!! $user->created_at !!}</p>
                        <p>Update : {!! $user->updated_at !!}</p>
                        <p>Delete : {!! $user->deleted_at !!}</p>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
