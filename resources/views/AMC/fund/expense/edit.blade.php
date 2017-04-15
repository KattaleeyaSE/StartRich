@extends('layouts.app')
@section('content')

<div class="row">
	<div class="container">
		{!! Form::model($expense, ['route' => ['amc.fund.update_expense', $expense->id], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}

			@include('AMC.fund.expense.partials._form')
			
			<hr>

			{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
			
		{!! Form::close() !!}
	</div>
</div>

@endsection