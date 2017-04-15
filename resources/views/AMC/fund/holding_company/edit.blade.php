@extends('layouts.app')
@section('content')

<div class="row">
	<div class="container">
		{!! Form::model($holding_company, ['route' => ['amc.fund.update_holding_company', $holding_company->id], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}

			@include('AMC.fund.holding_company.partials._form')
			
			<hr>

			{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
			
		{!! Form::close() !!}
	</div>
</div>

@endsection