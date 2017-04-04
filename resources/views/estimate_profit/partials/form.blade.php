<div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="company_name">Company name</label> 
    <div class="col-md-6 col-sm-6 col-xs-12">
        {{-- <input type="text" name="username" value="{{isset($member) ? $member->user->username : old('username')}}" class="form-control col-md-7 col-xs-12" />  --}}
    </div>
    @if ($errors->has('company_name'))
        <div class="row">
            <div class="col-md-12">
                <span class="help-block text-center">
                    <strong>{{ $errors->first('company_name') }}</strong>
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