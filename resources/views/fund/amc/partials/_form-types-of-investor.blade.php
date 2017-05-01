<div class="form-group{{ $errors->has('type_of_investor') ? ' has-error' : '' }}">
    {!! Form::label('type_of_investor', 'Types of Investor *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'type_of_investor']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::textarea('type_of_investor', null,['class' => 'form-control col-md-7 col-xs-12 required']) !!}
    </div>
        @if ($errors->has('type_of_investor'))
            <span class="help-block">
                <strong>{{ $errors->first('type_of_investor') }}</strong>
            </span>
        @endif
</div>