<a class="btn btn-primary" id="btn-add-purchase"> + </a>

<div class="row">
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('purchases.*.subscription_period') ? ' has-error' : '' }}">
			{!! Form::label('purchases[0][subscription_period]', 'Subscription Period *', ['class' => 'control-label']) !!}
		    {!! Form::text('purchases[0][subscription_period]', null,['class' => 'form-control required']) !!}
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
		    {!! Form::text('purchases[0][min_first_purchase]', null,['class' => 'form-control required']) !!}
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
		    {!! Form::text('purchases[0][min_additional]', null,['class' => 'form-control required']) !!}
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
		    {!! Form::text('purchases[0][redemtion_period]', null,['class' => 'form-control required']) !!}
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
		    {!! Form::text('purchases[0][min_redemption]', null,['class' => 'form-control required']) !!}
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
		    {!! Form::text('purchases[0][min_balance]', null,['class' => 'form-control required']) !!}
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
		    {!! Form::text('purchases[0][settlement_period]', null,['class' => 'form-control required']) !!}
		        @if ($errors->has('purchases[0][settlement_period]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('purchases.*.settlement_period') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
</div>

<div id="pane-add-purchase"></div>