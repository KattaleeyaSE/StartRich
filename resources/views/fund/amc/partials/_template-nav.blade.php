<div id="template-nav" style="visibility: hidden;">
	<div class="row">
		<div class="col-md-2">
			{!! Form::label('navs[ROW_INDEX][modified_date]', 'Modified date', ['class' => 'control-label']) !!}
			{!! Form::date('navs[ROW_INDEX][modified_date]', null, ['class' => 'form-control']) !!}
		</div>

		<div class="col-md-1">
			{!! Form::label('navs[ROW_INDEX][standard]', 'Standard', ['class' => 'control-label']) !!}
			{!! Form::text('navs[ROW_INDEX][standard]', null, ['class' => 'form-control']) !!}
		</div>

		<div class="col-md-1">
			{!! Form::label('navs[ROW_INDEX][bid]', 'Bid', ['class' => 'control-label']) !!}
			{!! Form::text('navs[ROW_INDEX][bid]', null, ['class' => 'form-control']) !!}
		</div>

		<div class="col-md-1">
			{!! Form::label('navs[ROW_INDEX][offer]', 'Offer', ['class' => 'control-label']) !!}
			{!! Form::text('navs[ROW_INDEX][offer]', null, ['class' => 'form-control']) !!}
		</div>
	</div>
</div>