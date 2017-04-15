@extends('layouts.app')
@section('content')

<div class="row">
	<div class="container">
		{!! Form::model($fee, ['route' => ['amc.fund.update_fee', $fee->id], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}

			@include('AMC.fund.fee.partials._form')
			
			<hr>

			{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
			
		{!! Form::close() !!}
	</div>
</div>

@endsection