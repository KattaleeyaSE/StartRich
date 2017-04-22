@if(isset($fund))
{!! Form::label('stock', 'Stock', ['class' => 'control-label']) !!}
{!! Form::text('stock', $fund->asset_allocation->stock, ['class' => 'form-control']) !!}

{!! Form::label('bond', 'Bond', ['class' => 'control-label']) !!}
{!! Form::text('bond', $fund->asset_allocation->bond, ['class' => 'form-control']) !!}

{!! Form::label('cash', 'Cash', ['class' => 'control-label']) !!}
{!! Form::text('cash', $fund->asset_allocation->cash, ['class' => 'form-control']) !!}

{!! Form::label('other', 'Other', ['class' => 'control-label']) !!}
{!! Form::text('other', $fund->asset_allocation->other, ['class' => 'form-control']) !!}
@else
{!! Form::label('stock', 'Stock', ['class' => 'control-label']) !!}
{!! Form::text('stock', null, ['class' => 'form-control']) !!}

{!! Form::label('bond', 'Bond', ['class' => 'control-label']) !!}
{!! Form::text('bond', null, ['class' => 'form-control']) !!}

{!! Form::label('cash', 'Cash', ['class' => 'control-label']) !!}
{!! Form::text('cash', null, ['class' => 'form-control']) !!}

{!! Form::label('other', 'Other', ['class' => 'control-label']) !!}
{!! Form::text('other', null, ['class' => 'form-control']) !!}

@endif