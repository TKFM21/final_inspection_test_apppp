@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Inspection Class2 Create</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('kensa_c2s.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('kensa_c1_id') ? ' has-error' : '' }}">
                            {!! Form::label('kensa_c1_id', 'Inspection Class1', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('kensa_c1_id', $kensa_c1s, null, ['class' => 'form-control']) !!}
                                @if ($errors->has('kensa_c1_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kensa_c1_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('kensa_c2') ? ' has-error' : '' }}">
                            <label for="kensa_c2" class="col-md-4 control-label">Inspection Class2</label>

                            <div class="col-md-6">
                                <input id="kensa_c2" type="text" class="form-control" name="kensa_c2" value="{{ old('kensa_c2') }}" required autofocus>

                                @if ($errors->has('kensa_c2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kensa_c2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('display_no') ? ' has-error' : '' }}">
                            <label for="display_no" class="col-md-4 control-label">Display</label>

                            <div class="col-md-6">
                                <input id="display_no" type="text" class="form-control" name="display_no" value="{{ old('display_no') }}" required autofocus>

                                @if ($errors->has('display_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('display_no') }}</strong>
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
