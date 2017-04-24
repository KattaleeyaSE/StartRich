<a class="btn btn-primary" id="btn-add-nav"> + </a>

	<div class="row">
		<div class="col-md-2">
			{!! Form::label('navs[0][modified_date]', 'Modified date', ['class' => 'control-label']) !!}
			{!! Form::date('navs[0][modified_date]', null, ['class' => 'form-control']) !!}
		</div>

		<div class="col-md-1">
			{!! Form::label('navs[0][standard]', 'Standard', ['class' => 'control-label']) !!}
			{!! Form::text('navs[0][standard]', null, ['class' => 'form-control']) !!}
		</div>

		<div class="col-md-1">
			{!! Form::label('navs[0][bid]', 'Bid', ['class' => 'control-label']) !!}
			{!! Form::text('navs[0][bid]', null, ['class' => 'form-control']) !!}
		</div>

		<div class="col-md-1">
			{!! Form::label('navs[0][offer]', 'Offer', ['class' => 'control-label']) !!}
			{!! Form::text('navs[0][offer]', null, ['class' => 'form-control']) !!}
		</div>
	</div>

<div id="pane-add-nav"></div>