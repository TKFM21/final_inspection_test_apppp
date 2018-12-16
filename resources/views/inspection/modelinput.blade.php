@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Inspection Model Input</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('inspection.modelquery') }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('kataban') ? ' has-error' : '' }}">
                            <label for="kataban" class="col-md-4 control-label">Model</label>

                            <div class="col-md-6">
                                <input id="kataban" type="text" class="form-control" name="kataban" value="{{ old('kataban') }}" autofocus>

                                @if ($errors->has('kataban'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kataban') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Query
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
