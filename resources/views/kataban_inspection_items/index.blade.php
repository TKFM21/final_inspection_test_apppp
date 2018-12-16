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

                    <h1>{!! link_to_route('kataban_inspection_items.create', 'Add Inspection Item') !!}</h1>
                        @foreach ($kataban_inspection_items as $kataban_inspection_item)
                            <p>{!! 'ID:'.$kataban_inspection_item->id !!}</p>
                            @if(isset($kataban_inspection_item->kataban->kataban))
                                <p>Model : {!! $kataban_inspection_item->kataban->kataban !!}</p>
                            @else
                                <p>Model：未指定</p>
                            @endif
                            @if(isset($kataban_inspection_item->kensa_c2->kensa_c1->kensa_c1))
                                <p>Inspection : {!! $kataban_inspection_item->kensa_c2->kensa_c1->kensa_c1 !!}/{!! $kataban_inspection_item->kensa_c2->kensa_c2 !!}</p>
                            @else
                                <p>Inspection：未指定</p>
                            @endif
                            <p>Text Value : {!! $kataban_inspection_item->text_value !!}</p>
                            <p>Nominal Value : {!! $kataban_inspection_item->nominal_value !!}</p>
                            <p>Upper Value : {!! $kataban_inspection_item->upper_value !!}</p>
                            <p>Lower Value : {!! $kataban_inspection_item->lower_value !!}</p>
                            <p>Create : {!! $kataban_inspection_item->created_at !!}</p>
                            <p>Update : {!! $kataban_inspection_item->updated_at !!}</p>
                            <br>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
