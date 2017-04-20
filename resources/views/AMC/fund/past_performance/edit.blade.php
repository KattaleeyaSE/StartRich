@extends('layouts.app')
@section('content')

<div class="row">
	<div class="container">
		{!! Form::model($past_performance, ['route' => ['amc.fund.update_past_performance', $past_performance->id], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}

			@include('AMC.fund.past_performance.partials._form-edit')
			
			<hr>

			{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
			
		{!! Form::close() !!}
	</div>
</div>

@endsection