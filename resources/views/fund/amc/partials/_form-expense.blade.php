<a class="btn btn-primary" id="btn-add-expense"> + </a>

<div class="row">
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('expenses.*.manager_fee') ? ' has-error' : '' }}">
			{!! Form::label('expenses[0][manager_fee]', 'Manager Fee *', ['class' => 'control-label']) !!}
		    {!! Form::text('expenses[0][manager_fee]', null,['class' => 'form-control required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
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
		    {!! Form::text('expenses[0][actual_manager_fee]', null,['class' => 'form-control required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
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
		    {!! Form::text('expenses[0][total_expense_ratio]', null,['class' => 'form-control required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
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
		    {!! Form::text('expenses[0][trustee_fee]', null,['class' => 'form-control required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
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
		    {!! Form::text('expenses[0][actual_trustee_fee]', null,['class' => 'form-control required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
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
		    {!! Form::text('expenses[0][registrar_fee]', null,['class' => 'form-control required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
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
		    {!! Form::text('expenses[0][actual_registrar_fee]', null,['class' => 'form-control required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
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
		    {!! Form::text('expenses[0][other_fee]', null,['class' => 'form-control required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('expenses[0][other_fee]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('expenses.*.other_fee') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
</div>

<div id="pane-add-expense"></div>