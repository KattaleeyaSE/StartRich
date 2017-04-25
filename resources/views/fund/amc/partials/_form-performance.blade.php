<a class="btn btn-primary" id="btn-add-performance"> + </a>

{!! Form::label('performance_date', 'date', ['class' => 'control-label']) !!}
{!! Form::date('performance_date', null, ['class' => 'form-control']) !!}

<div class="row">
	<div class="col-md-2">
		{!! Form::label('name', 'name', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[0][name]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('3month', '3month', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[0][3month]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('6month', '6month', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[0][6month]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('1year', '1year', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[0][1year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('3year', '3year', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[0][3year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('5year', '5year', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[0][5year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('10year', '10year', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[0][10year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('since_inception', 'since_inception', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[0][since_inception]', null, ['class' => 'form-control']) !!}
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		{!! Form::label('name', 'name', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[3][name]', 'Benchmark 1', ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('3month', '3month', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[3][3month]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('6month', '6month', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[3][6month]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('1year', '1year', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[3][1year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('3year', '3year', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[3][3year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('5year', '5year', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[3][5year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('10year', '10year', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[3][10year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('since_inception', 'since_inception', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[3][since_inception]', null, ['class' => 'form-control']) !!}
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		{!! Form::label('name', 'name', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[1][name]', 'Information Ratio', ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('3month', '3month', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[1][3month]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('6month', '6month', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[1][6month]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('1year', '1year', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[1][1year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('3year', '3year', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[1][3year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('5year', '5year', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[1][5year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('10year', '10year', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[1][10year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('since_inception', 'since_inception', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[1][since_inception]', null, ['class' => 'form-control']) !!}
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		{!! Form::label('name', 'name', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[2][name]', 'Standard Deviation', ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('3month', '3month', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[2][3month]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('6month', '6month', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[2][6month]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('1year', '1year', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[2][1year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('3year', '3year', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[2][3year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('5year', '5year', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[2][5year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('10year', '10year', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[2][10year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('since_inception', 'since_inception', ['class' => 'control-label']) !!}
		{!! Form::text('past_performances[2][since_inception]', null, ['class' => 'form-control']) !!}
	</div>
</div>

<div id="pane-add-performance"></div>