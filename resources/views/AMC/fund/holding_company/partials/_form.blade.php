<div class="form-group">
	{!! Form::label('name', 'Company Name', ['class' => 'control-label']) !!}
	{!! Form::text('name', null, ['class' => 'form-control required', 'required' => 'required', 'maxlength' => '255', 'pattern' => '^[A-z0-9 ]{1,}$']) !!}
	<div class="help-block with-errors"></div>
</div>

<div class="form-group">
	{!! Form::label('percentage', 'Percentage', ['class' => 'control-label']) !!}
	{!! Form::text('percentage', null, ['class' => 'form-control required', 'required' => 'required', 'maxlength' => '10', 'pattern' => '^[0-9.]{1,}$']) !!}
	<div class="help-block with-errors"></div>
</div>