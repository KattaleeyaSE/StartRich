@extends('layouts.app')
@section('content')

<div class="row">
	<div class="container">
		{!! Form::model($nav, ['route' => ['amc.fund.update_nav', $nav->id], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}

			@include('AMC.fund.nav.partials._form')
			
			<hr>

			{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
			
		{!! Form::close() !!}
	</div>
</div>

@endsection