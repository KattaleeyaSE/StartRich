<a class="btn btn-primary" id="btn-add-fee"> + </a>

<div class="row">
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('fees.*.front_end_fee') ? ' has-error' : '' }}">
		    {!! Form::label('fees[0][front_end_fee]', 'Front End Fee *', ['class' => 'control-label']) !!}
		    {!! Form::text('fees[0][front_end_fee]', null,['class' => 'form-control required']) !!}
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
		    {!! Form::text('fees[0][actual_front_end_fee]', null,['class' => 'form-control required']) !!}
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
		    {!! Form::text('fees[0][back_end_fee]', null,['class' => 'form-control required']) !!}
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
		    {!! Form::text('fees[0][actual_back_end_fee]', null,['class' => 'form-control required']) !!}
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
		    {!! Form::text('fees[0][switching_fee]', null,['class' => 'form-control required']) !!}
		        @if ($errors->has('fees[0][switching_fee]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('fees.*.switching_fee') }}</strong>
		            </span>
		        @endif
		</div>
	</div>

</div>

<div id="pane-add-fee"></div>