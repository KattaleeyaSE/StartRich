<a class="btn btn-primary" id="btn-add-fee"> + </a>

<div class="row">
	<div class="col-md-2">
		{!! Form::label('fees[0][front_end_fee]', 'front_end_fee', ['class' => 'control-label']) !!}
		{!! Form::text('fees[0][front_end_fee]', null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-md-2">
		{!! Form::label('fees[0][actual_front_end_fee]', 'actual_front_end_fee', ['class' => 'control-label']) !!}
		{!! Form::text('fees[0][actual_front_end_fee]', null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-md-2">
		{!! Form::label('fees[0][back_end_fee]', 'back_end_fee', ['class' => 'control-label']) !!}
		{!! Form::text('fees[0][back_end_fee]', null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-md-2">
		{!! Form::label('fees[0][actual_back_end_fee]', 'actual_back_end_fee', ['class' => 'control-label']) !!}
		{!! Form::text('fees[0][actual_back_end_fee]', null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-md-2">
		{!! Form::label('fees[0][switching_fee]', 'switching_fee', ['class' => 'control-label']) !!}
		{!! Form::text('fees[0][switching_fee]', null, ['class' => 'form-control']) !!}
	</div>

</div>

<div id="pane-add-fee"></div>
<hr>
<a class="btn btn-primary" id="btn-add-purchase"> + </a>

<div class="row">
	<div class="col-md-2">
		{!! Form::label('purchases[0][subscription_period]', 'subscription_period', ['class' => 'control-label']) !!}
		{!! Form::text('purchases[0][subscription_period]', null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-md-2">
		{!! Form::label('purchases[0][min_first_purchase]', 'min_first_purchase', ['class' => 'control-label']) !!}
		{!! Form::text('purchases[0][min_first_purchase]', null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-md-2">
		{!! Form::label('purchases[0][min_additional]', 'min_additional', ['class' => 'control-label']) !!}
		{!! Form::text('purchases[0][min_additional]', null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-md-2">
		{!! Form::label('purchases[0][redemtion_period]', 'redemtion_period', ['class' => 'control-label']) !!}
		{!! Form::text('purchases[0][redemtion_period]', null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-md-2">
		{!! Form::label('purchases[0][min_redemption]', 'min_redemption', ['class' => 'control-label']) !!}
		{!! Form::text('purchases[0][min_redemption]', null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-md-2">
		{!! Form::label('purchases[0][min_balance]', 'min_balance', ['class' => 'control-label']) !!}
		{!! Form::text('purchases[0][min_balance]', null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-md-2">
		{!! Form::label('purchases[0][settlement_period]', 'settlement_period', ['class' => 'control-label']) !!}
		{!! Form::text('purchases[0][settlement_period]', null, ['class' => 'form-control']) !!}
	</div>
</div>

<div id="pane-add-purchase"></div>
<hr>
<a class="btn btn-primary" id="btn-add-expense"> + </a>

<div class="row">
	<div class="col-md-2">
		{!! Form::label('expenses[ROW_INDEX][manager_fee]', 'manager_fee', ['class' => 'control-label']) !!}
		{!! Form::text('expenses[ROW_INDEX][manager_fee]', null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-md-2">
		{!! Form::label('expenses[ROW_INDEX][actual_manager_fee]', 'actual_manager_fee', ['class' => 'control-label']) !!}
		{!! Form::text('expenses[ROW_INDEX][actual_manager_fee]', null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-md-2">
		{!! Form::label('expenses[ROW_INDEX][total_expense_ratio]', 'total_expense_ratio', ['class' => 'control-label']) !!}
		{!! Form::text('expenses[ROW_INDEX][total_expense_ratio]', null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-md-2">
		{!! Form::label('expenses[ROW_INDEX][trustee_fee]', 'trustee_fee', ['class' => 'control-label']) !!}
		{!! Form::text('expenses[ROW_INDEX][trustee_fee]', null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-md-2">
		{!! Form::label('expenses[ROW_INDEX][actual_trustee_fee]', 'actual_trustee_fee', ['class' => 'control-label']) !!}
		{!! Form::text('expenses[ROW_INDEX][actual_trustee_fee]', null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-md-2">
		{!! Form::label('expenses[ROW_INDEX][registrar_fee]', 'registrar_fee', ['class' => 'control-label']) !!}
		{!! Form::text('expenses[ROW_INDEX][registrar_fee]', null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-md-2">
		{!! Form::label('expenses[ROW_INDEX][actual_registrar_fee]', 'actual_registrar_fee', ['class' => 'control-label']) !!}
		{!! Form::text('expenses[ROW_INDEX][actual_registrar_fee]', null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-md-2">
		{!! Form::label('expenses[ROW_INDEX][other_fee]', 'other_fee', ['class' => 'control-label']) !!}
		{!! Form::text('expenses[ROW_INDEX][other_fee]', null, ['class' => 'form-control']) !!}
	</div>
</div>

<div id="pane-add-expense"></div>