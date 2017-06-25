<div class="form-group">
	{!! Form::label('manager_name', 'Manager Name', ['class' => 'control-label']) !!}
	{!! Form::text('manager_name', null, ['class' => 'form-control required', 'required' => 'required']) !!}
	<div class="help-block with-errors"></div>
</div>

<div class="form-group">
	{!! Form::label('manager_position', 'Manager Position', ['class' => 'control-label']) !!}
	{!! Form::text('manager_position', null, ['class' => 'form-control required', 'required' => 'required']) !!}
	<div class="help-block with-errors"></div>
</div>

<div class="form-group">
	{!! Form::label('management_date', 'Management Date', ['class' => 'control-label']) !!}
	{!! Form::date('management_date', null, ['class' => 'form-control required', 'required' => 'required']) !!}
	<div class="help-block with-errors"></div>
</div>	