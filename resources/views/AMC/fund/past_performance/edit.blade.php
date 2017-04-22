@extends('layouts.app')
@section('content')

<div class="row">
	<div class="container">
	<a class="btn btn-primary" id="btnAddField"> + </a>
		{!! Form::model($past_performance, ['route' => ['amc.fund.update_past_performance', $past_performance->id], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}

			@include('AMC.fund.past_performance.partials._form-edit')
			
			<hr>

			{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
			
		{!! Form::close() !!}
	</div>
</div>
@include('AMC.fund.past_performance.partials._row-template')

@endsection

@section('script')
	<script type="text/javascript">

		var next_index = {!!$past_performance->records->count()!!}

		$('#btnAddField').click( function () {
			var template = $('#row-template').html()
			template = template.replace(new RegExp("ROW_INDEX", 'g'), 'new' + next_index)
			template = template.replace("DEFAULT_ROW_NAME", "Benchmark " + (next_index - 2))
			$('#addingPane').append(template)
			next_index++
		});
	</script>
@endsection