@extends('layouts.app')
@section('content')

<div class="row">
	<div class="container">
		{!! Form::model($purchase_detail, ['route' => ['amc.fund.update_purchase_detail', $purchase_detail->id], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}

			@include('AMC.fund.purchase_detail.partials._form')
			
			<hr>

			{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
			
		{!! Form::close() !!}
	</div>
</div>

@endsection