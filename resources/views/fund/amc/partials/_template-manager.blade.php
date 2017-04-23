<div id="template-manager" style="visibility: hidden;">
	<div class="row">

			{!! Form::label('managers[ROW_INDEX][name]', 'Name', ['class' => 'control-label']) !!}
			{!! Form::text('managers[ROW_INDEX][name]', null, ['class' => 'form-control']) !!}

			{!! Form::label('managers[ROW_INDEX][position]', 'Position', ['class' => 'control-label']) !!}
			{!! Form::text('managers[ROW_INDEX][position]', null, ['class' => 'form-control']) !!}

			{!! Form::label('managers[ROW_INDEX][management_date]', 'Management Date', ['class' => 'control-label']) !!}
			{!! Form::date('managers[ROW_INDEX][management_date]', null, ['class' => 'form-control']) !!}

	</div>
</div>