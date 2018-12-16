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

                    <h1>{!! link_to_route('kensa_c2s.create', 'Add Inspection Class2') !!}</h1>
                    
                    @foreach ($kensa_c2s as $kensa_c2)
                        
                        <p>{!! 'ID:'.$kensa_c2->id.'/'.$kensa_c2->kensa_c1.'('.$kensa_c2->c1d.')'.'/'.$kensa_c2->kensa_c2 !!}</p>
                        <p>Display : {!! $kensa_c2->display_no !!}</p>
                        <p>Create : {!! $kensa_c2->created_at !!}</p>
                        <p>Update : {!! $kensa_c2->updated_at !!}</p>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
