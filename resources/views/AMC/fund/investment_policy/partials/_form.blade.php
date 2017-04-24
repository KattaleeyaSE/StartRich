{!! Form::label('investment_asset_detail', 'investment_asset_detail', ['class' => 'control-label']) !!}
{!! Form::text('investment_asset_detail', null, ['class' => 'form-control']) !!}

{!! Form::label('strategy_detail', 'strategy_detail', ['class' => 'control-label']) !!}
{!! Form::select('strategy_detail', ['Active Management' => 'Active Management', 'Passive Management' => 'Passive Management'], null, ['class' => 'form-control']) !!}

{!! Form::label('factor_impact', 'factor_impact', ['class' => 'control-label']) !!}
{!! Form::text('factor_impact', null, ['class' => 'form-control']) !!}

{!! Form::label('benchmark_detail', 'benchmark_detail', ['class' => 'control-label']) !!}
{!! Form::text('benchmark_detail', null, ['class' => 'form-control']) !!}