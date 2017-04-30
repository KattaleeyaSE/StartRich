<div class="form-group{{ $errors->has('major_risk_factor') ? ' has-error' : '' }}">
    {!! Form::label('major_risk_factor', 'Major Risk Factor *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'major_risk_factor']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::textarea('major_risk_factor', null,['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
        @if ($errors->has('major_risk_factor'))
            <span class="help-block">
                <strong>{{ $errors->first('major_risk_factor') }}</strong>
            </span>
        @endif
</div>