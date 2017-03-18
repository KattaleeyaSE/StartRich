@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body"> 
                    <form action="{{url('login')}}" method="post"  class="form-horizontal">
                        {!!csrf_field()!!}
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Username</label> 
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="username" value="{{old('username')}}" class="form-control col-md-7 col-xs-12" /> 
                            </div>
                            @if ($errors->has('username'))
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="help-block text-center">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password</label> 
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" name="password" class="form-control col-md-7 col-xs-12" /> 
                            </div>
                            @if ($errors->has('password'))
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="help-block text-center">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>                        
                    </from> 
                </div>

            </div>
        </div>
    </div>
</div>
@endsection