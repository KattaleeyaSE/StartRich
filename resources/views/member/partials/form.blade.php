<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username</label> 
    <div class="col-md-6 col-sm-6 col-xs-12">
        @if($submit_text !='Edit')
        <input type="text" name="username" value="{{isset($member) ? $member->user->username : old('username')}}" class="form-control col-md-7 col-xs-12" required/> 
        @else
         <input type="text" name="username" value="{{isset($member) ? $member->user->username : old('username')}}" class="form-control col-md-7 col-xs-12" readonly/> 
        @endif
        <div class="help-block with-errors"></div>
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
<div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">Firstname</label> 
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" name="firstname" value="{{isset($member) ? $member->firstname : old('firstname')}}" class="form-control col-md-7 col-xs-12" pattern="^[A-z0-9 ]{1,}$" required/> 
        <div class="help-block with-errors"></div>
    </div>
    @if ($errors->has('firstname'))
        <div class="row">
            <div class="col-md-12">
                <span class="help-block text-center">
                    <strong>{{ $errors->first('firstname') }}</strong>
                </span>
            </div>
        </div>
    @endif
</div>
<div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Lastname</label> 
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" name="lastname" value="{{isset($member) ? $member->lastname : old('lastname')}}" class="form-control col-md-7 col-xs-12" pattern="^[A-z0-9 ]{1,}$" required/> 
        <div class="help-block with-errors"></div>
    </div>
    @if ($errors->has('lastname'))
        <div class="row">
            <div class="col-md-12">
                <span class="help-block text-center">
                    <strong>{{ $errors->first('lastname') }}</strong>
                </span>
            </div>
        </div>
    @endif
</div>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email</label> 
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="email" name="email" value="{{isset($member) ? $member->user->email : old('email')}}" class="form-control col-md-7 col-xs-12" required/> 
        <div class="help-block with-errors"></div>
    </div>
    @if ($errors->has('email'))
        <div class="row">
            <div class="col-md-12">
                <span class="help-block text-center">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            </div>
        </div>
    @endif
</div>
<div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Phone Number</label> 
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" name="phone_number" value="{{isset($member) ? $member->phone_number : old('phone_number')}}" class="form-control col-md-7 col-xs-12" maxlength="10" pattern="^[0-9]{1,}$" required/> 
        <div class="help-block with-errors"></div>
    </div>
    @if ($errors->has('phone_number'))
        <div class="row">
            <div class="col-md-12">
                <span class="help-block text-center">
                    <strong>{{ $errors->first('phone_number') }}</strong>
                </span>
            </div>
        </div>
    @endif
</div>
<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password</label> 
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="password" id="password" name="password" class="form-control col-md-7 col-xs-12" minlength="6" maxlength="15" pattern="^[_A-z0-9]{1,}$"/> 
        <div class="help-block with-errors"></div>
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
<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password_confirmation">Confirm Password</label> 
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="password" name="password_confirmation" class="form-control col-md-7 col-xs-12" data-match="#password" /> 
        <div class="help-block with-errors"></div>
    </div>
    @if ($errors->has('password_confirmation'))
        <div class="row">
            <div class="col-md-12">
                <span class="help-block text-center">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            </div>
        </div>
    @endif
</div>
<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <button type="submit" class="btn btn-primary">{{$submit_text}}</button>
    </div>
</div>