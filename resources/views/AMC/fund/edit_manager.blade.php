@extends('layouts.app')
@section('content')

<div class="row">
	<div class="container">
		{!! Form::model($manager, ['route' => ['amc.fund.update_manager', $manager->id], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}

			@include('AMC.fund.partials._form-manager')
			
			<hr>

			{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
			
		{!! Form::close() !!}
	</div>
</div>

@endsection