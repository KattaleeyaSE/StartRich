<div id="template-fee" style="visibility: hidden;">
	<div class="row">
		<div class="col-md-2">
			{!! Form::label('fees[ROW_INDEX][front_end_fee]', 'front_end_fee', ['class' => 'control-label']) !!}
			{!! Form::text('fees[ROW_INDEX][front_end_fee]', null, ['class' => 'form-control required', 'required' => 'required']) !!}
		</div>
		<div class="col-md-2">
			{!! Form::label('fees[ROW_INDEX][actual_front_end_fee]', 'actual_front_end_fee', ['class' => 'control-label']) !!}
			{!! Form::text('fees[ROW_INDEX][actual_front_end_fee]', null, ['class' => 'form-control required', 'required' => 'required']) !!}
		</div>
		<div class="col-md-2">
			{!! Form::label('fees[ROW_INDEX][back_end_fee]', 'back_end_fee', ['class' => 'control-label']) !!}
			{!! Form::text('fees[ROW_INDEX][back_end_fee]', null, ['class' => 'form-control required', 'required' => 'required']) !!}
		</div>
		<div class="col-md-2">
			{!! Form::label('fees[ROW_INDEX][actual_back_end_fee]', 'actual_back_end_fee', ['class' => 'control-label']) !!}
			{!! Form::text('fees[ROW_INDEX][actual_back_end_fee]', null, ['class' => 'form-control required', 'required' => 'required']) !!}
		</div>
		<div class="col-md-2">
			{!! Form::label('fees[ROW_INDEX][switching_fee]', 'switching_fee', ['class' => 'control-label']) !!}
			{!! Form::text('fees[ROW_INDEX][switching_fee]', null, ['class' => 'form-control required', 'required' => 'required']) !!}
		</div>
	</div>
</div>

<div id="template-purchase" style="visibility: hidden;">
	<div class="row">
		<div class="col-md-2">
			{!! Form::label('purchases[ROW_INDEX][subscription_period]', 'subscription_period', ['class' => 'control-label']) !!}
			{!! Form::text('purchases[ROW_INDEX][subscription_period]', null, ['class' => 'form-control required', 'required' => 'required']) !!}
		</div>
		<div class="col-md-2">
			{!! Form::label('purchases[ROW_INDEX][min_first_purchase]', 'min_first_purchase', ['class' => 'control-label']) !!}
			{!! Form::text('purchases[ROW_INDEX][min_first_purchase]', null, ['class' => 'form-control required', 'required' => 'required']) !!}
		</div>
		<div class="col-md-2">
			{!! Form::label('purchases[ROW_INDEX][min_additional]', 'min_additional', ['class' => 'control-label']) !!}
			{!! Form::text('purchases[ROW_INDEX][min_additional]', null, ['class' => 'form-control required', 'required' => 'required']) !!}
		</div>
		<div class="col-md-2">
			{!! Form::label('purchases[ROW_INDEX][redemtion_period]', 'redemtion_period', ['class' => 'control-label']) !!}
			{!! Form::text('purchases[ROW_INDEX][redemtion_period]', null, ['class' => 'form-control required', 'required' => 'required']) !!}
		</div>
		<div class="col-md-2">
			{!! Form::label('purchases[ROW_INDEX][min_redemption]', 'min_redemption', ['class' => 'control-label']) !!}
			{!! Form::text('purchases[ROW_INDEX][min_redemption]', null, ['class' => 'form-control required', 'required' => 'required']) !!}
		</div>
		<div class="col-md-2">
			{!! Form::label('purchases[ROW_INDEX][min_balance]', 'min_balance', ['class' => 'control-label']) !!}
			{!! Form::text('purchases[ROW_INDEX][min_balance]', null, ['class' => 'form-control required', 'required' => 'required']) !!}
		</div>
		<div class="col-md-2">
			{!! Form::label('purchases[ROW_INDEX][settlement_period]', 'settlement_period', ['class' => 'control-label']) !!}
			{!! Form::text('purchases[ROW_INDEX][settlement_period]', null, ['class' => 'form-control required', 'required' => 'required']) !!}
		</div>
	</div>
</div>

<div id="template-expense" style="visibility: hidden;">
	<div class="row">
		<div class="col-md-2">
			{!! Form::label('expenses[ROW_INDEX][manager_fee]', 'manager_fee', ['class' => 'control-label']) !!}
			{!! Form::text('expenses[ROW_INDEX][manager_fee]', null, ['class' => 'form-control required', 'required' => 'required']) !!}
		</div>
		<div class="col-md-2">
			{!! Form::label('expenses[ROW_INDEX][actual_manager_fee]', 'actual_manager_fee', ['class' => 'control-label']) !!}
			{!! Form::text('expenses[ROW_INDEX][actual_manager_fee]', null, ['class' => 'form-control required', 'required' => 'required']) !!}
		</div>
		<div class="col-md-2">
			{!! Form::label('expenses[ROW_INDEX][total_expense_ratio]', 'total_expense_ratio', ['class' => 'control-label']) !!}
			{!! Form::text('expenses[ROW_INDEX][total_expense_ratio]', null, ['class' => 'form-control required', 'required' => 'required']) !!}
		</div>
		<div class="col-md-2">
			{!! Form::label('expenses[ROW_INDEX][trustee_fee]', 'trustee_fee', ['class' => 'control-label']) !!}
			{!! Form::text('expenses[ROW_INDEX][trustee_fee]', null, ['class' => 'form-control required', 'required' => 'required']) !!}
		</div>
		<div class="col-md-2">
			{!! Form::label('expenses[ROW_INDEX][actual_trustee_fee]', 'actual_trustee_fee', ['class' => 'control-label']) !!}
			{!! Form::text('expenses[ROW_INDEX][actual_trustee_fee]', null, ['class' => 'form-control required', 'required' => 'required']) !!}
		</div>
		<div class="col-md-2">
			{!! Form::label('expenses[ROW_INDEX][registrar_fee]', 'registrar_fee', ['class' => 'control-label']) !!}
			{!! Form::text('expenses[ROW_INDEX][registrar_fee]', null, ['class' => 'form-control required', 'required' => 'required']) !!}
		</div>
		<div class="col-md-2">
			{!! Form::label('expenses[ROW_INDEX][actual_registrar_fee]', 'actual_registrar_fee', ['class' => 'control-label']) !!}
			{!! Form::text('expenses[ROW_INDEX][actual_registrar_fee]', null, ['class' => 'form-control required', 'required' => 'required']) !!}
		</div>
		<div class="col-md-2">
			{!! Form::label('expenses[ROW_INDEX][other_fee]', 'other_fee', ['class' => 'control-label']) !!}
			{!! Form::text('expenses[ROW_INDEX][other_fee]', null, ['class' => 'form-control required', 'required' => 'required']) !!}
		</div>
	</div>
</div>