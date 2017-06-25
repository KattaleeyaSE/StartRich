<div class="form-group{{ $errors->has('investment_asset_detail') ? ' has-error' : '' }}">
    {!! Form::label('investment_asset_detail', 'Investment Asset Detail *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'investment_asset_detail']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::text('investment_asset_detail', null,['class' => 'form-control col-md-7 col-xs-12 required', 'pattern' => '^[_A-z0-9]{1,}$']) !!}
            <div class="help-block with-errors"></div>
    </div>
        @if ($errors->has('investment_asset_detail'))
            <span class="help-block">
                <strong>{{ $errors->first('investment_asset_detail') }}</strong>
            </span>
        @endif
</div>

<div class="form-group{{ $errors->has('strategy_detail') ? ' has-error' : '' }}">
    {!! Form::label('strategy_detail', 'Strategy Detail *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'strategy_detail']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::text('strategy_detail', null,['class' => 'form-control col-md-7 col-xs-12 required', 'pattern' => '^[_A-z0-9]{1,}$']) !!}
            <div class="help-block with-errors"></div>
    </div>
        @if ($errors->has('strategy_detail'))
            <span class="help-block">
                <strong>{{ $errors->first('strategy_detail') }}</strong>
            </span>
        @endif
</div>

<div class="form-group{{ $errors->has('factor_impact') ? ' has-error' : '' }}">
    {!! Form::label('factor_impact', 'Factor Impact *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'factor_impact']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::text('factor_impact', null,['class' => 'form-control col-md-7 col-xs-12 required', 'pattern' => '^[_A-z0-9]{1,}$']) !!}
            <div class="help-block with-errors"></div>
    </div>
        @if ($errors->has('factor_impact'))
            <span class="help-block">
                <strong>{{ $errors->first('factor_impact') }}</strong>
            </span>
        @endif
</div>

<div class="form-group{{ $errors->has('benchmark_detail') ? ' has-error' : '' }}">
    {!! Form::label('benchmark_detail', 'Benchmark Detail *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'benchmark_detail']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::text('benchmark_detail', null,['class' => 'form-control col-md-7 col-xs-12 required', 'pattern' => '^[_A-z0-9]{1,}$']) !!}
            <div class="help-block with-errors"></div>
    </div>
        @if ($errors->has('benchmark_detail'))
            <span class="help-block">
                <strong>{{ $errors->first('benchmark_detail') }}</strong>
            </span>
        @endif
</div>