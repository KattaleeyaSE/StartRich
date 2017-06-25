<div class="form-group">
	{!! Form::label('payment_date', 'Payment Date', ['class' => 'control-label']) !!}
	{!! Form::date('payment_date', null, ['class' => 'form-control required', 'required' => 'required']) !!}
	<div class="help-block with-errors"></div>
</div>
<div class="form-group">
	{!! Form::label('dividend_price', 'Dividend Price', ['class' => 'control-label']) !!}
	{!! Form::text('dividend_price', null, ['class' => 'form-control required', 'required' => 'required']) !!}
	<div class="help-block with-errors"></div>
</div>