<a class="btn btn-primary" id="btn-add-manager"> + </a>

	<div class="row">

		{!! Form::label('managers[0][name]', 'Name', ['class' => 'control-label']) !!}
		{!! Form::text('managers[0][name]', null, ['class' => 'form-control']) !!}

		{!! Form::label('managers[0][position]', 'Position', ['class' => 'control-label']) !!}
		{!! Form::text('managers[0][position]', null, ['class' => 'form-control']) !!}

		{!! Form::label('managers[0][management_date]', 'Management Date', ['class' => 'control-label']) !!}
		{!! Form::date('managers[0][management_date]', null, ['class' => 'form-control']) !!}
			
	</div>

<div id="pane-add-manager"></div>