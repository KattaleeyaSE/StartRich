@extends('layouts.app')
@section('content')

<div class="row">
	<div class="container">
		{!! Form::model($fund, ['route' => ['amc.fund.update', $fund->id], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}

			{!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		
			{!! Form::label('code', 'Code', ['class' => 'control-label']) !!}
			{!! Form::text('code', null, ['class' => 'form-control']) !!}
		
			{!! Form::label('type', 'Type', ['class' => 'control-label']) !!}
			{!! Form::select('type', $fund_types, null, ['class' => 'form-control']) !!}
		
			{!! Form::label('aimc_type', 'AIMC Type', ['class' => 'control-label']) !!}
			{!! Form::select('aimc_type', $aimc_types, null, ['class' => 'form-control']) !!}
		
			{!! Form::label('management_company', 'Management Company', ['class' => 'control-label']) !!}
			{!! Form::text('management_company', null, ['class' => 'form-control']) !!}
		
			{!! Form::label('trustee', 'Trustee', ['class' => 'control-label']) !!}
			{!! Form::text('trustee', null, ['class' => 'form-control']) !!}
		
			{!! Form::label('payment_policy', 'Payment Policy', ['class' => 'control-label']) !!}
			{!! Form::select('payment_policy', [1 => 'Have', 0 => 'Not Have'], null, ['class' => 'form-control']) !!}
		
			{!! Form::label('frequency', 'Frequency of subscription and redemption', ['class' => 'control-label']) !!}
			{!! Form::text('frequency', null, ['class' => 'form-control']) !!}
		
			{!! Form::label('approved_by', 'Approved by', ['class' => 'control-label']) !!}
			{!! Form::text('approved_by', null, ['class' => 'form-control']) !!}
		
			{!! Form::label('supervision', 'Supervision', ['class' => 'control-label']) !!}
			{!! Form::text('supervision', null, ['class' => 'form-control']) !!}
		
			{!! Form::label('protected_fund', 'Protected Fund', ['class' => 'control-label']) !!}
			{!! Form::select('protected_fund', [1 => 'Have', 0 => 'Not Have'], null, ['class' => 'form-control']) !!}
		
			{!! Form::label('name_of_guarantor', 'Name of Guarantor', ['class' => 'control-label']) !!}
			{!! Form::text('name_of_guarantor', null, ['class' => 'form-control']) !!}
		
			{!! Form::label('fund_start', 'Fund Start', ['class' => 'control-label']) !!}
			{!! Form::date('fund_start', null, ['class' => 'form-control']) !!}
		
			{!! Form::label('fund_end', 'Fund End', ['class' => 'control-label']) !!}
			{!! Form::date('fund_end', null, ['class' => 'form-control']) !!}
		
			{!! Form::label('risk_level', 'Risk Level', ['class' => 'control-label']) !!}
			{!! Form::select('risk_level', [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8], null, ['class' => 'form-control']) !!}
		
			{!! Form::label('net_asset_value', 'Net Asset Value', ['class' => 'control-label']) !!}
			{!! Form::number('net_asset_value', null, ['class' => 'form-control']) !!}

			<hr>
			
			{!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
			
		{!! Form::close() !!}
	</div>
</div>

@endsection