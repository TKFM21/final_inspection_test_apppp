@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Model Create</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('katabans.store') }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('kataban') ? ' has-error' : '' }}">
                            <label for="kataban" class="col-md-4 control-label">Model No.</label>

                            <div class="col-md-6">
                                <input id="kataban" type="text" class="form-control" name="kataban" value="{{ old('kataban') }}" required autofocus>

                                @if ($errors->has('kataban'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kataban') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('rated_voltage') ? ' has-error' : '' }}">
                            <label for="rated_voltage" class="col-md-4 control-label">定格電圧</label>

                            <div class="col-md-6">
                                <input id="rated_voltage" type="text" class="form-control" name="rated_voltage" value="{{ old('rated_voltage') }}" required autofocus>

                                @if ($errors->has('rated_voltage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rated_voltage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('fan_kbn1_id') ? ' has-error' : '' }}">
                            {!! Form::label('fan_kbn1_id', 'Fan Class1', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('fan_kbn1_id', $fan_kbn1s, null, ['class' => 'form-control']) !!}
                                @if ($errors->has('fan_kbn1_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fan_kbn1_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('revision') ? ' has-error' : '' }}">
                            <label for="revision" class="col-md-4 control-label">Revision</label>

                            <div class="col-md-6">
                                <input id="revision" type="text" class="form-control" name="revision" value="{{ old('revision') }}" required autofocus>

                                @if ($errors->has('revision'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('revision') }}</strong>
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
