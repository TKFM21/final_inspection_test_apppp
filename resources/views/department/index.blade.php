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

                    <h1>{!! link_to_route('department.create', 'Add department') !!}</h1>
                    
                    @foreach ($departments as $department)
                        <h1>{!! 'ID:'.$department->id.'/'.$department->department !!}</h1>
                        <h2>Create : {!! $department->created_at !!}</h2>
                        <h2>Update : {!! $department->updated_at !!}</h2>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
