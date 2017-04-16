@extends('layouts.app')
@section('content')

<div class="row">
	<div class="container">
		{!! Form::open(['route' => ['amc.fund.store_past_performance', $fund->id], 'class' => 'form-horizontal']) !!}

			@include('AMC.fund.past_performance.partials._form')
			
			<hr>

			{!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
			
		{!! Form::close() !!}
	</div>
</div>

@include('AMC.fund.past_performance.partials._row-template')

@endsection