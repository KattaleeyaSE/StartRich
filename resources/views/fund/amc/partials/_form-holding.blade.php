<a class="btn btn-primary" id="btn-add-company"> + </a>

	<div class="row">

		{!! Form::label('companies[0][name]', 'Company Name', ['class' => 'control-label']) !!}
		{!! Form::text('companies[0][name]', null, ['class' => 'form-control']) !!}

		{!! Form::label('companies[0][percentage]', 'Percentage', ['class' => 'control-label']) !!}
		{!! Form::text('companies[0][percentage]', null, ['class' => 'form-control']) !!}
			
	</div>

<div id="pane-add-company"></div>