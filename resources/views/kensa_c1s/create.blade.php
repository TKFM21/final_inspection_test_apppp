@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Inspection Class1 Create</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('kensa_c1s.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('kensa_c1') ? ' has-error' : '' }}">
                            <label for="kensa_c1" class="col-md-4 control-label">Inspection Class1</label>

                            <div class="col-md-6">
                                <input id="kensa_c1" type="text" class="form-control" name="kensa_c1" value="{{ old('kensa_c1') }}" required autofocus>

                                @if ($errors->has('kensa_c1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kensa_c1') }}</strong>
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
