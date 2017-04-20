@extends('layouts.app')
@section('content')

<div class="row">
	<div class="container">
	<a class="btn btn-primary" id="btnAddField"> + </a>

		{!! Form::open(['route' => ['amc.fund.store_past_performance', $fund->id], 'class' => 'form-horizontal']) !!}

			@include('AMC.fund.past_performance.partials._form')
			
			<hr>

			{!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
			
		{!! Form::close() !!}
	</div>
</div>

@include('AMC.fund.past_performance.partials._row-template')

@endsection

@section('script')
	<script type="text/javascript">

		var next_index = 4

		$('#btnAddField').click( function () {
			var template = $('#row-template').html()
			template = template.replace(new RegExp("ROW_INDEX", 'g'), next_index)
			template = template.replace("DEFAULT_ROW_NAME", "Benchmark " + (next_index - 2))
			$('#addingPane').append(template)
			next_index++
		});
	</script>
@endsection