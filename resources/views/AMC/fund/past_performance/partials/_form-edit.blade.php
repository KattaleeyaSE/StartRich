<a class="btn btn-primary" id="btn-add-performance"> + </a>

<div class="form-group">
{!! Form::label('date', 'date', ['class' => 'control-label']) !!}
{!! Form::date('date', null, ['class' => 'form-control required', 'required' => 'required']) !!}
<div class="help-block with-errors"></div>
</div>

@foreach($past_performance->records as $record)
<div class="row">
	<div class="col-md-2 form-group">
		{!! Form::label('name', 'name', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances['.$record->id.'][name]', $record->name, ['class' => 'form-control required', 'required' => 'required']) !!}
		<div class="help-block with-errors"></div>
	</div>

	<div class="col-md-1 form-group">
		{!! Form::label('3month', '3month', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances['.$record->id.'][3month]', $record->threemonth, ['class' => 'form-control required', 'required' => 'required']) !!}
		<div class="help-block with-errors"></div>
	</div>

	<div class="col-md-1 form-group">
		{!! Form::label('6month', '6month', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances['.$record->id.'][6month]', $record->sixmonth, ['class' => 'form-control required', 'required' => 'required']) !!}
		<div class="help-block with-errors"></div>
	</div>

	<div class="col-md-1 form-group">
		{!! Form::label('1year', '1year', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances['.$record->id.'][1year]', $record->oneyear, ['class' => 'form-control required', 'required' => 'required']) !!}
		<div class="help-block with-errors"></div>
	</div>

	<div class="col-md-1 form-group">
		{!! Form::label('3year', '3year', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances['.$record->id.'][3year]', $record->threeyear, ['class' => 'form-control required', 'required' => 'required']) !!}
		<div class="help-block with-errors"></div>
	</div>

	<div class="col-md-1 form-group">
		{!! Form::label('5year', '5year', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances['.$record->id.'][5year]', $record->fiveyear, ['class' => 'form-control required', 'required' => 'required']) !!}
		<div class="help-block with-errors"></div>
	</div>

	<div class="col-md-1 form-group">
		{!! Form::label('10year', '10year', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances['.$record->id.'][10year]', $record->tenyear, ['class' => 'form-control required', 'required' => 'required']) !!}
		<div class="help-block with-errors"></div>
	</div>

	<div class="col-md-1 form-group">
		{!! Form::label('since_inception', 'since_inception', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances['.$record->id.'][since_inception]', $record->since_inception, ['class' => 'form-control required', 'required' => 'required']) !!}
		<div class="help-block with-errors"></div>
	</div>
</div>
@endforeach

<div id="pane-add-performance"></div>