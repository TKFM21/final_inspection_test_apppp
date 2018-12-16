@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Inspection : {!! $kataban->kataban !!} (ID:{!! $kataban->id !!} /Rev.{!! $kataban->revision !!})</h1></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('final_inspection_records.store', ['kataban' => $kataban, 'kataban_inspection_items' => $kataban_inspection_items, 'final_inspection_record' => $final_inspection_record]) }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('order_no') ? ' has-error' : '' }}">
                            <label for="order_no" class="col-md-2 control-label">Order No.</label>

                            <div class="col-md-4">
                                <input id="order_no" type="text" class="form-control" name="order_no" value="{{ old('order_no') }}" required autofocus>

                                @if ($errors->has('order_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('order_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('lot_no') ? ' has-error' : '' }}">
                            <label for="lot_no" class="col-md-2 control-label">Lot No.</label>

                            <div class="col-md-4">
                                <input id="lot_no" type="text" class="form-control" name="lot_no" value="{{ old('lot_no') }}" required autofocus>

                                @if ($errors->has('lot_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lot_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('qty') ? ' has-error' : '' }}">
                            <label for="qty" class="col-md-2 control-label">Qty.</label>

                            <div class="col-md-2">
                                <input id="qty" type="text" class="form-control" name="qty" value="{{ old('qty') }}" required autofocus>

                                @if ($errors->has('qty'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('qty') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <p>定格電圧 : {!! $kataban->rated_voltage !!} V</p>
                        <p>Fan Class1 : {!! $kataban->fan_kbn1->fan_kbn1 !!} Type</p>
                        
                        @foreach ($kataban_inspection_items as $kataban_inspection_item)
                            <p>Inspection : {!! $kataban_inspection_item->kensa_c2->kensa_c1->kensa_c1 !!}/{!! $kataban_inspection_item->kensa_c2->kensa_c2 !!}</p>
                            <p>Text Value : {!! $kataban_inspection_item->text_value !!}</p>
                            <p>Nominal Value : {!! $kataban_inspection_item->nominal_value !!} ({!! $kataban_inspection_item->lower_value !!}〜{!! $kataban_inspection_item->upper_value !!})</p>
                            @if (isset($kataban_inspection_item->nominal_value))
                                
                                <div class="form-group{{ $errors->has('measure_record'.$kataban_inspection_item->id) ? ' has-error' : '' }}">
                                    <div class="col-md-4">
                                        <input id="{{ 'measure_record'.$kataban_inspection_item->id }}" type="text" class="form-control" name="{{ 'measure_record'.$kataban_inspection_item->id }}" value="{{ old('measure_record'.$kataban_inspection_item->id) }}" >

                                        @if ($errors->has('measure_record'.$kataban_inspection_item->id))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('measure_record'.$kataban_inspection_item->id) }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                            @else
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="{{ 'check_record'.$kataban_inspection_item->id }}" {{ old('check_record'.$kataban_inspection_item->id) ? 'checked' : '' }}> OK
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                            @endif
                            <br>
                        @endforeach

                        <div class="form-group{{ $errors->has('judge') ? ' has-error' : '' }}">
                            {!! Form::label('judge', 'Judgement', ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-3">
                                {!! Form::select('judge', array(0 => 'NG', 1 => 'OK'), 1, ['class' => 'form-control']) !!}
                                @if ($errors->has('judge'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('judge') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    Store
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
