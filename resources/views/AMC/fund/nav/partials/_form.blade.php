<div class="form-group">
	{!! Form::label('standard', 'Standard', ['class' => 'control-label']) !!}
	{!! Form::text('standard', null, ['class' => 'form-control required', 'required' => 'required']) !!}
	<div class="help-block with-errors"></div>
</div>

<div class="form-group">
	{!! Form::label('bid', 'Bid', ['class' => 'control-label']) !!}
	{!! Form::text('bid', null, ['class' => 'form-control required', 'required' => 'required']) !!}
	<div class="help-block with-errors"></div>
</div>

<div class="form-group">
	{!! Form::label('offer', 'Offer', ['class' => 'control-label']) !!}
	{!! Form::text('offer', null, ['class' => 'form-control required', 'required' => 'required']) !!}
	<div class="help-block with-errors"></div>
</div>

<div class="form-group">
	{!! Form::label('modified_date', 'Management Date', ['class' => 'control-label']) !!}
	{!! Form::date('modified_date', null, ['class' => 'form-control required', 'required' => 'required']) !!}
	<div class="help-block with-errors"></div>
</div>