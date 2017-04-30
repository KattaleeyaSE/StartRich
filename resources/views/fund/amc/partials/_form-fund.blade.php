<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Name *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'name']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::text('name', null,['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
</div>

<div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
    {!! Form::label('code', 'Code *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'code']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::text('code', null,['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
        @if ($errors->has('code'))
            <span class="help-block">
                <strong>{{ $errors->first('code') }}</strong>
            </span>
        @endif
</div>

<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
    {!! Form::label('type', 'Type *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'type']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
	{!! Form::select('type', $fund_types, null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
        @if ($errors->has('type'))
            <span class="help-block">
                <strong>{{ $errors->first('type') }}</strong>
            </span>
        @endif
</div>

<div class="form-group{{ $errors->has('aimc_type') ? ' has-error' : '' }}">
    {!! Form::label('aimc_type', 'AIMC Type *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'aimc_type']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
	{!! Form::select('aimc_type', $fund_types, null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
        @if ($errors->has('aimc_type'))
            <span class="help-block">
                <strong>{{ $errors->first('aimc_type') }}</strong>
            </span>
        @endif
</div>

<div class="form-group{{ $errors->has('management_company') ? ' has-error' : '' }}">
    {!! Form::label('management_company', 'Management Company *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'management_company']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::text('management_company', null,['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
        @if ($errors->has('management_company'))
            <span class="help-block">
                <strong>{{ $errors->first('management_company') }}</strong>
            </span>
        @endif
</div>

<div class="form-group{{ $errors->has('trustee') ? ' has-error' : '' }}">
    {!! Form::label('trustee', 'Trustee *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'trustee']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::text('trustee', null,['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
        @if ($errors->has('trustee'))
            <span class="help-block">
                <strong>{{ $errors->first('trustee') }}</strong>
            </span>
        @endif
</div>

<div class="form-group{{ $errors->has('payment_policy') ? ' has-error' : '' }}">
    {!! Form::label('payment_policy', 'Payment Policy *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'payment_policy']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
	{!! Form::select('payment_policy', [1 => 'Have', 0 => 'Not Have'], null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
        @if ($errors->has('payment_policy'))
            <span class="help-block">
                <strong>{{ $errors->first('payment_policy') }}</strong>
            </span>
        @endif
</div>

<div class="form-group{{ $errors->has('frequency') ? ' has-error' : '' }}">
    {!! Form::label('frequency', 'Frequency of subscription and redemption *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'frequency']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::text('frequency', null,['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
        @if ($errors->has('frequency'))
            <span class="help-block">
                <strong>{{ $errors->first('frequency') }}</strong>
            </span>
        @endif
</div>

<div class="form-group{{ $errors->has('approved_by') ? ' has-error' : '' }}">
    {!! Form::label('approved_by', 'Approved by *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'approved_by']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::text('approved_by', null,['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
        @if ($errors->has('approved_by'))
            <span class="help-block">
                <strong>{{ $errors->first('approved_by') }}</strong>
            </span>
        @endif
</div>

<div class="form-group{{ $errors->has('supervision') ? ' has-error' : '' }}">
    {!! Form::label('supervision', 'Supervision *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'supervision']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::text('supervision', null,['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
        @if ($errors->has('supervision'))
            <span class="help-block">
                <strong>{{ $errors->first('supervision') }}</strong>
            </span>
        @endif
</div>

<div class="form-group{{ $errors->has('protected_fund') ? ' has-error' : '' }}">
    {!! Form::label('protected_fund', 'Payment Policy *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'protected_fund']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
	{!! Form::select('protected_fund', [1 => 'Have', 0 => 'Not Have'], null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
        @if ($errors->has('protected_fund'))
            <span class="help-block">
                <strong>{{ $errors->first('protected_fund') }}</strong>
            </span>
        @endif
</div>

<div class="form-group{{ $errors->has('name_of_guarantor') ? ' has-error' : '' }}">
    {!! Form::label('name_of_guarantor', 'Name of Guarantor *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'name_of_guarantor']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::text('name_of_guarantor', null,['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
        @if ($errors->has('name_of_guarantor'))
            <span class="help-block">
                <strong>{{ $errors->first('name_of_guarantor') }}</strong>
            </span>
        @endif
</div>

<div class="form-group{{ $errors->has('fund_start') ? ' has-error' : '' }}">
    {!! Form::label('fund_start', 'Fund Start *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'fund_start']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::date('fund_start', null,['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
        @if ($errors->has('fund_start'))
            <span class="help-block">
                <strong>{{ $errors->first('fund_start') }}</strong>
            </span>
        @endif
</div>

<div class="form-group{{ $errors->has('fund_end') ? ' has-error' : '' }}">
    {!! Form::label('fund_end', 'Fund End *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'fund_end']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::date('fund_end', null,['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
        @if ($errors->has('fund_end'))
            <span class="help-block">
                <strong>{{ $errors->first('fund_end') }}</strong>
            </span>
        @endif
</div>

<div class="form-group{{ $errors->has('risk_level') ? ' has-error' : '' }}">
    {!! Form::label('risk_level', 'Risk Level *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'risk_level']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
	{!! Form::select('risk_level', [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8], null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
        @if ($errors->has('risk_level'))
            <span class="help-block">
                <strong>{{ $errors->first('risk_level') }}</strong>
            </span>
        @endif
</div>

<div class="form-group{{ $errors->has('net_asset_value') ? ' has-error' : '' }}">
    {!! Form::label('net_asset_value', 'Net Asset Value *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'net_asset_value']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::number('net_asset_value', null,['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
        @if ($errors->has('net_asset_value'))
            <span class="help-block">
                <strong>{{ $errors->first('net_asset_value') }}</strong>
            </span>
        @endif
</div>