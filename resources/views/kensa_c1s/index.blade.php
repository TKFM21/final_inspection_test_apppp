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

                    <h1>{!! link_to_route('kensa_c1s.create', 'Add Inspection Class1') !!}</h1>
                    
                    @foreach ($kensa_c1s as $kensa_c1)
                        <p>{!! 'ID:'.$kensa_c1->id.'/'.$kensa_c1->kensa_c1 !!}</p>
                        <p>Display : {!! $kensa_c1->display_no !!}</p>
                        <p>Create : {!! $kensa_c1->created_at !!}</p>
                        <p>Update : {!! $kensa_c1->updated_at !!}</p>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
