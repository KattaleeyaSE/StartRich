@extends('layouts.app')
@section('content')

<div class="row">
	<div class="container">
		{!! Form::open(['route' => ['amc.fund.store_fee', $fund->id], 'class' => 'form-horizontal']) !!}

			@include('AMC.fund.fee.partials._form')
			
			<hr>

			{!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
			
		{!! Form::close() !!}
	</div>
</div>

@endsection