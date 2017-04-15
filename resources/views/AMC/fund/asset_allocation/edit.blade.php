@extends('layouts.app')
@section('content')

<div class="row">
	<div class="container">
		{!! Form::model($asset_allocation, ['route' => ['amc.fund.update_asset_allocation', $asset_allocation->id], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}

			@include('AMC.fund.asset_allocation.partials._form')
			
			<hr>

			{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
			
		{!! Form::close() !!}
	</div>
</div>

@endsection