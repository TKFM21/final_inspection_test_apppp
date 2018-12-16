@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    {!! Form::open(['route' => 'register', 'class' => 'form-horizontal']) !!}
                        
                        <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                            {!! Form::label('code', 'Code', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('code', old('code'), ['class' => 'form-control', 'required']) !!}
                                @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <!--<label for="name" class="col-md-4 control-label">Name</label>-->
                            {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                <!--<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>-->
                                {!! Form::text('name', old('name'), ['class' => 'form-control', 'required', 'autofocus']) !!}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('gender_id') ? ' has-error' : '' }}">
                            {!! Form::label('gender_id', 'Gender', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('gender_id', $genders, null, ['class' => 'form-control']) !!}
                                @if ($errors->has('gender_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('department_id') ? ' has-error' : '' }}">
                            {!! Form::label('department_id', 'Department', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('department_id', $departments, null, ['class' => 'form-control']) !!}
                                @if ($errors->has('department_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                            {!! Form::label('role_id', 'Role', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('role_id', $roles, null, ['class' => 'form-control']) !!}
                                @if ($errors->has('role_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Register', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
