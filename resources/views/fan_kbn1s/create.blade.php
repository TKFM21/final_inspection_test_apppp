@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Fan Class Create</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('fan_kbn1s.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('fan_kbn1') ? ' has-error' : '' }}">
                            <label for="fan_kbn1" class="col-md-4 control-label">Fan Class1</label>

                            <div class="col-md-6">
                                <input id="fan_kbn1" type="text" class="form-control" name="fan_kbn1" value="{{ old('fan_kbn1') }}" required autofocus>

                                @if ($errors->has('fan_kbn1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fan_kbn1') }}</strong>
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
