@extends('layouts.app')
@section('content')

<div class="row">
	<div class="container">
		{!! Form::model($fund, ['route' => ['amc.fund.update_investment_policy', $fund->id], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}

			@include('AMC.fund.investment_policy.partials._form')
			
			<hr>

			{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
			
		{!! Form::close() !!}
	</div>
</div>

@endsection