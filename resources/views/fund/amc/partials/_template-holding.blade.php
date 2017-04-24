<div id="template-company" style="visibility: hidden;">
	<div class="row">

		{!! Form::label('companies[ROW_INDEX][name]', 'Company Name', ['class' => 'control-label']) !!}
		{!! Form::text('companies[ROW_INDEX][name]', null, ['class' => 'form-control']) !!}

		{!! Form::label('companies[ROW_INDEX][percentage]', 'Percentage', ['class' => 'control-label']) !!}
		{!! Form::text('companies[ROW_INDEX][percentage]', null, ['class' => 'form-control']) !!}

	</div>
</div>