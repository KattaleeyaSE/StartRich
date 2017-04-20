{!! Form::label('date', 'date', ['class' => 'control-label']) !!}
{!! Form::date('date', null, ['class' => 'form-control']) !!}

<div class="row">
	<div class="col-md-2">
		{!! Form::label('name', 'name', ['class' => 'control-label']) !!}
		{!! Form::text('data[0][name]', $fund->name, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('3month', '3month', ['class' => 'control-label']) !!}
		{!! Form::text('data[0][3month]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('6month', '6month', ['class' => 'control-label']) !!}
		{!! Form::text('data[0][6month]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('1year', '1year', ['class' => 'control-label']) !!}
		{!! Form::text('data[0][1year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('3year', '3year', ['class' => 'control-label']) !!}
		{!! Form::text('data[0][3year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('5year', '5year', ['class' => 'control-label']) !!}
		{!! Form::text('data[0][5year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('10year', '10year', ['class' => 'control-label']) !!}
		{!! Form::text('data[0][10year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('since_inception', 'since_inception', ['class' => 'control-label']) !!}
		{!! Form::text('data[0][since_inception]', null, ['class' => 'form-control']) !!}
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		{!! Form::label('name', 'name', ['class' => 'control-label']) !!}
		{!! Form::text('data[3][name]', 'Benchmark 1', ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('3month', '3month', ['class' => 'control-label']) !!}
		{!! Form::text('data[3][3month]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('6month', '6month', ['class' => 'control-label']) !!}
		{!! Form::text('data[3][6month]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('1year', '1year', ['class' => 'control-label']) !!}
		{!! Form::text('data[3][1year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('3year', '3year', ['class' => 'control-label']) !!}
		{!! Form::text('data[3][3year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('5year', '5year', ['class' => 'control-label']) !!}
		{!! Form::text('data[3][5year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('10year', '10year', ['class' => 'control-label']) !!}
		{!! Form::text('data[3][10year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('since_inception', 'since_inception', ['class' => 'control-label']) !!}
		{!! Form::text('data[3][since_inception]', null, ['class' => 'form-control']) !!}
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		{!! Form::label('name', 'name', ['class' => 'control-label']) !!}
		{!! Form::text('data[1][name]', 'Information Ratio', ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('3month', '3month', ['class' => 'control-label']) !!}
		{!! Form::text('data[1][3month]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('6month', '6month', ['class' => 'control-label']) !!}
		{!! Form::text('data[1][6month]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('1year', '1year', ['class' => 'control-label']) !!}
		{!! Form::text('data[1][1year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('3year', '3year', ['class' => 'control-label']) !!}
		{!! Form::text('data[1][3year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('5year', '5year', ['class' => 'control-label']) !!}
		{!! Form::text('data[1][5year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('10year', '10year', ['class' => 'control-label']) !!}
		{!! Form::text('data[1][10year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('since_inception', 'since_inception', ['class' => 'control-label']) !!}
		{!! Form::text('data[1][since_inception]', null, ['class' => 'form-control']) !!}
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		{!! Form::label('name', 'name', ['class' => 'control-label']) !!}
		{!! Form::text('data[2][name]', 'Standard Deviation', ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('3month', '3month', ['class' => 'control-label']) !!}
		{!! Form::text('data[2][3month]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('6month', '6month', ['class' => 'control-label']) !!}
		{!! Form::text('data[2][6month]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('1year', '1year', ['class' => 'control-label']) !!}
		{!! Form::text('data[2][1year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('3year', '3year', ['class' => 'control-label']) !!}
		{!! Form::text('data[2][3year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('5year', '5year', ['class' => 'control-label']) !!}
		{!! Form::text('data[2][5year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('10year', '10year', ['class' => 'control-label']) !!}
		{!! Form::text('data[2][10year]', null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-1">
		{!! Form::label('since_inception', 'since_inception', ['class' => 'control-label']) !!}
		{!! Form::text('data[2][since_inception]', null, ['class' => 'form-control']) !!}
	</div>
</div>

<div id="addingPane"></div>