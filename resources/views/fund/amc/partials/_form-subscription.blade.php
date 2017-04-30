<!-- <a class="btn btn-primary" id="btn-add-fee"> + </a> -->


<div class="row">
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('fees.*.front_end_fee') ? ' has-error' : '' }}">
		    {!! Form::label('fees[0][front_end_fee]', 'Front End Fee *', ['class' => 'control-label']) !!}
		    {!! Form::text('fees[0][front_end_fee]', null,['class' => 'form-control']) !!}
		        @if ($errors->has('fees[0][front_end_fee]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('fees.*.front_end_fee') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('fees.*.actual_front_end_fee') ? ' has-error' : '' }}">
			{!! Form::label('fees[0][actual_front_end_fee]', 'Actual Front End Fee *', ['class' => 'control-label']) !!}
		    {!! Form::text('fees[0][actual_front_end_fee]', null,['class' => 'form-control']) !!}
		        @if ($errors->has('fees[0][actual_front_end_fee]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('fees.*.actual_front_end_fee') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('fees.*.back_end_fee') ? ' has-error' : '' }}">
			{!! Form::label('fees[0][back_end_fee]', 'Back End Fee *', ['class' => 'control-label']) !!}
		    {!! Form::text('fees[0][back_end_fee]', null,['class' => 'form-control']) !!}
		        @if ($errors->has('fees[0][back_end_fee]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('fees.*.back_end_fee') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('fees.*.actual_back_end_fee') ? ' has-error' : '' }}">
			{!! Form::label('fees[0][actual_back_end_fee]', 'Actual Back End Fee *', ['class' => 'control-label']) !!}
		    {!! Form::text('fees[0][actual_back_end_fee]', null,['class' => 'form-control']) !!}
		        @if ($errors->has('fees[0][actual_back_end_fee]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('fees.*.actual_back_end_fee') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('fees.*.switching_fee') ? ' has-error' : '' }}">
			{!! Form::label('fees[0][switching_fee]', 'Switching Fee *', ['class' => 'control-label']) !!}
		    {!! Form::text('fees[0][switching_fee]', null,['class' => 'form-control']) !!}
		        @if ($errors->has('fees[0][switching_fee]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('fees.*.switching_fee') }}</strong>
		            </span>
		        @endif
		</div>
	</div>

</div>

<div id="pane-add-fee"></div>
<hr>
<!-- <a class="btn btn-primary" id="btn-add-purchase"> + </a> -->

<div class="row">
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('purchases.*.subscription_period') ? ' has-error' : '' }}">
			{!! Form::label('purchases[0][subscription_period]', 'Subscription Period *', ['class' => 'control-label']) !!}
		    {!! Form::text('purchases[0][subscription_period]', null,['class' => 'form-control']) !!}
		        @if ($errors->has('purchases[0][subscription_period]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('purchases.*.subscription_period') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('purchases.*.min_first_purchase') ? ' has-error' : '' }}">
			{!! Form::label('purchases[0][min_first_purchase]', 'Min First Purchase *', ['class' => 'control-label']) !!}
		    {!! Form::text('purchases[0][min_first_purchase]', null,['class' => 'form-control']) !!}
		        @if ($errors->has('purchases[0][min_first_purchase]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('purchases.*.min_first_purchase') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('purchases.*.min_additional') ? ' has-error' : '' }}">
			{!! Form::label('purchases[0][min_additional]', 'Min Additional *', ['class' => 'control-label']) !!}
		    {!! Form::text('purchases[0][min_additional]', null,['class' => 'form-control']) !!}
		        @if ($errors->has('purchases[0][min_additional]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('purchases.*.min_additional') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('purchases.*.redemtion_period') ? ' has-error' : '' }}">
			{!! Form::label('purchases[0][redemtion_period]', 'Redemption Period *', ['class' => 'control-label']) !!}
		    {!! Form::text('purchases[0][redemtion_period]', null,['class' => 'form-control']) !!}
		        @if ($errors->has('purchases[0][redemtion_period]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('purchases.*.redemtion_period') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('purchases.*.min_redemption') ? ' has-error' : '' }}">
			{!! Form::label('purchases[0][min_redemption]', 'Min Redemption *', ['class' => 'control-label']) !!}
		    {!! Form::text('purchases[0][min_redemption]', null,['class' => 'form-control']) !!}
		        @if ($errors->has('purchases[0][min_redemption]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('purchases.*.min_redemption') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('purchases.*.min_balance') ? ' has-error' : '' }}">
			{!! Form::label('purchases[0][min_balance]', 'Min Balance *', ['class' => 'control-label']) !!}
		    {!! Form::text('purchases[0][min_balance]', null,['class' => 'form-control']) !!}
		        @if ($errors->has('purchases[0][min_balance]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('purchases.*.min_balance') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('purchases.*.settlement_period') ? ' has-error' : '' }}">
			{!! Form::label('purchases[0][settlement_period]', 'Settlement Period *', ['class' => 'control-label']) !!}
		    {!! Form::text('purchases[0][settlement_period]', null,['class' => 'form-control']) !!}
		        @if ($errors->has('purchases[0][settlement_period]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('purchases.*.settlement_period') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
</div>

<div id="pane-add-purchase"></div>
<hr>
<!-- <a class="btn btn-primary" id="btn-add-expense"> + </a> -->

<div class="row">
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('expenses.*.manager_fee') ? ' has-error' : '' }}">
			{!! Form::label('expenses[0][manager_fee]', 'Manager Fee *', ['class' => 'control-label']) !!}
		    {!! Form::text('expenses[0][manager_fee]', null,['class' => 'form-control']) !!}
		        @if ($errors->has('expenses[0][manager_fee]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('expenses.*.manager_fee') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('expenses.*.actual_manager_fee') ? ' has-error' : '' }}">
			{!! Form::label('expenses[0][actual_manager_fee]', 'Actual Manager Fee *', ['class' => 'control-label']) !!}
		    {!! Form::text('expenses[0][actual_manager_fee]', null,['class' => 'form-control']) !!}
		        @if ($errors->has('expenses[0][actual_manager_fee]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('expenses.*.actual_manager_fee') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('expenses.*.total_expense_ratio') ? ' has-error' : '' }}">
			{!! Form::label('expenses[0][total_expense_ratio]', 'Total Expense Ratio *', ['class' => 'control-label']) !!}
		    {!! Form::text('expenses[0][total_expense_ratio]', null,['class' => 'form-control']) !!}
		        @if ($errors->has('expenses[0][total_expense_ratio]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('expenses.*.total_expense_ratio') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('expenses.*.trustee_fee') ? ' has-error' : '' }}">
			{!! Form::label('expenses[0][trustee_fee]', 'Trustee Fee *', ['class' => 'control-label']) !!}
		    {!! Form::text('expenses[0][trustee_fee]', null,['class' => 'form-control']) !!}
		        @if ($errors->has('expenses[0][trustee_fee]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('expenses.*.trustee_fee') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('expenses.*.actual_trustee_fee') ? ' has-error' : '' }}">
			{!! Form::label('expenses[0][actual_trustee_fee]', 'Actual Trustee Fee *', ['class' => 'control-label']) !!}
		    {!! Form::text('expenses[0][actual_trustee_fee]', null,['class' => 'form-control']) !!}
		        @if ($errors->has('expenses[0][actual_trustee_fee]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('expenses.*.actual_trustee_fee') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('expenses.*.registrar_fee') ? ' has-error' : '' }}">
			{!! Form::label('expenses[0][registrar_fee]', 'Registrar Fee *', ['class' => 'control-label']) !!}
		    {!! Form::text('expenses[0][registrar_fee]', null,['class' => 'form-control']) !!}
		        @if ($errors->has('expenses[0][registrar_fee]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('expenses.*.registrar_fee') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('expenses.*.actual_registrar_fee') ? ' has-error' : '' }}">
			{!! Form::label('expenses[0][actual_registrar_fee]', 'Actual Registrar Fee *', ['class' => 'control-label']) !!}
		    {!! Form::text('expenses[0][actual_registrar_fee]', null,['class' => 'form-control']) !!}
		        @if ($errors->has('expenses[0][actual_registrar_fee]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('expenses.*.actual_registrar_fee') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('expenses.*.other_fee') ? ' has-error' : '' }}">
			{!! Form::label('expenses[0][other_fee]', 'Other Fee *', ['class' => 'control-label']) !!}
		    {!! Form::text('expenses[0][other_fee]', null,['class' => 'form-control']) !!}
		        @if ($errors->has('expenses[0][other_fee]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('expenses.*.other_fee') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
</div>

<div id="pane-add-expense"></div>