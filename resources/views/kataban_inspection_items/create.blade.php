@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Inspection Create</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('kataban_inspection_items.store') }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('kataban_id') ? ' has-error' : '' }}">
                            {!! Form::label('kataban_id', 'Model', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('kataban_id', $katabans, null, ['class' => 'form-control']) !!}
                                @if ($errors->has('kataban_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kataban_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('kensa_c2_id') ? ' has-error' : '' }}">
                            {!! Form::label('kensa_c2_id', 'Inspection Item', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {{-- {!! Form::select('kensa_c2_id', $kensa_c2s, null, ['class' => 'form-control']) !!} --}}
                                <select name="kensa_c2_id" id="kensa_c2_id" class="form-control">
                                    @foreach($kensa_c2s as $kensa_c2)
                                        <option value="{{ $kensa_c2->id }}">{{ $kensa_c2->kensa_c1->kensa_c1 }}/{{ $kensa_c2->kensa_c2 }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('kensa_c2_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kensa_c2_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('text_value') ? ' has-error' : '' }}">
                            <label for="text_value" class="col-md-4 control-label">Text Value</label>

                            <div class="col-md-6">
                                <input id="text_value" type="text" class="form-control" name="text_value" value="{{ old('text_value') }}" autofocus>

                                @if ($errors->has('text_value'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('text_value') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('nominal_value') ? ' has-error' : '' }}">
                            <label for="nominal_value" class="col-md-4 control-label">Nominal Value</label>

                            <div class="col-md-6">
                                <input id="nominal_value" type="text" class="form-control" name="nominal_value" value="{{ old('nominal_value') }}" autofocus>

                                @if ($errors->has('nominal_value'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nominal_value') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('upper_value') ? ' has-error' : '' }}">
                            <label for="upper_value" class="col-md-4 control-label">Upper Value</label>

                            <div class="col-md-6">
                                <input id="upper_value" type="text" class="form-control" name="upper_value" value="{{ old('upper_value') }}" autofocus>

                                @if ($errors->has('upper_value'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('upper_value') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('lower_value') ? ' has-error' : '' }}">
                            <label for="lower_value" class="col-md-4 control-label">Lower Value</label>

                            <div class="col-md-6">
                                <input id="lower_value" type="text" class="form-control" name="lower_value" value="{{ old('lower_value') }}" autofocus>

                                @if ($errors->has('lower_value'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lower_value') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
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
