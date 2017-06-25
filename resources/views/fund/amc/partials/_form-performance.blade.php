<a class="btn btn-primary" id="btn-add-performance"> + </a>

		<div class="form-group{{ $errors->has('performance_date') ? ' has-error' : '' }}">
			{!! Form::label('performance_date', 'Date *', ['class' => 'control-label']) !!}
			{!! Form::date('performance_date', null, ['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('performance_date'))
		            <span class="help-block">
		                <strong>{{ $errors->first('performance_date') }}</strong>
		            </span>
		        @endif
		</div>


<div class="row">
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('past_performances.*.name') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[0][name]', 'Name *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[0][name]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$', 'id' => 'create-fund-return', 'readonly' => 'readonly']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[0][name]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.name') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('past_performances.*.3month') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[0][3month]', '3 Month *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[0][3month]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[0][3month]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.3month') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('past_performances.*.6month') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[0][6month]', '6 Month *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[0][6month]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[0][6month]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.6month') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('past_performances.*.1year') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[0][1year]', '1 Year *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[0][1year]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[0][1year]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.1year') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('past_performances.*.3year') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[0][3year]', '3 Year *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[0][3year]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[0][3year]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.3year') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('past_performances.*.5year') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[0][5year]', '5 Year *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[0][5year]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[0][5year]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.5year') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('past_performances.*.10year') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[0][10year]', '10 Year *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[0][10year]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[0][10year]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.10year') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('past_performances.*.since_inception') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[0][since_inception]', '10 Year *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[0][since_inception]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[0][since_inception]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.since_inception') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('past_performances.*.name') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[3][name]', 'Name *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[3][name]', 'Benchmark 1',['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$', 'readonly' => 'readonly']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[3][name]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.name') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('past_performances.*.3month') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[3][3month]', '3 Month *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[3][3month]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[3][3month]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.3month') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('past_performances.*.6month') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[3][6month]', '6 Month *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[3][6month]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[3][6month]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.6month') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('past_performances.*.1year') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[3][1year]', '1 Year *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[3][1year]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[3][1year]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.1year') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('past_performances.*.3year') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[3][3year]', '3 Year *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[3][3year]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[3][3year]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.3year') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('past_performances.*.5year') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[3][5year]', '5 Year *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[3][5year]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[3][5year]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.5year') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('past_performances.*.10year') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[3][10year]', '10 Year *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[3][10year]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[3][10year]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.10year') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('past_performances.*.since_inception') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[3][since_inception]', '10 Year *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[3][since_inception]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[3][since_inception]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.since_inception') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('past_performances.*.name') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[1][name]', 'Name *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[1][name]', 'Information Ratio',['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$', 'readonly' => 'readonly']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[1][name]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.name') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('past_performances.*.3month') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[1][3month]', '3 Month *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[1][3month]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[1][3month]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.3month') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('past_performances.*.6month') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[1][6month]', '6 Month *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[1][6month]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[1][6month]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.6month') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('past_performances.*.1year') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[1][1year]', '1 Year *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[1][1year]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[1][1year]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.1year') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('past_performances.*.3year') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[1][3year]', '3 Year *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[1][3year]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[1][3year]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.3year') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('past_performances.*.5year') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[1][5year]', '5 Year *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[1][5year]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[1][5year]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.5year') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('past_performances.*.10year') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[1][10year]', '10 Year *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[1][10year]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[1][10year]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.10year') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('past_performances.*.since_inception') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[1][since_inception]', '10 Year *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[1][since_inception]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[1][since_inception]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.since_inception') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('past_performances.*.name') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[2][name]', 'Name *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[2][name]', 'Standard Deviation',['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$', 'readonly' => 'readonly']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[2][name]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.name') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('past_performances.*.3month') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[2][3month]', '3 Month *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[2][3month]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[2][3month]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.3month') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('past_performances.*.6month') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[2][6month]', '6 Month *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[2][6month]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[2][6month]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.6month') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('past_performances.*.1year') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[2][1year]', '1 Year *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[2][1year]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[2][1year]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.1year') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('past_performances.*.3year') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[2][3year]', '3 Year *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[2][3year]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[2][3year]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.3year') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('past_performances.*.5year') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[2][5year]', '5 Year *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[2][5year]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[2][5year]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.5year') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('past_performances.*.10year') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[2][10year]', '10 Year *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[2][10year]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[2][10year]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.10year') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('past_performances.*.since_inception') ? ' has-error' : '' }}">
		    {!! Form::label('past_performances[2][since_inception]', '10 Year *', ['class' => 'control-label']) !!}
		    {!! Form::text('past_performances[2][since_inception]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		        @if ($errors->has('past_performances[2][since_inception]'))
		            <span class="help-block">
		                <strong>{{ $errors->first('past_performances.*.since_inception') }}</strong>
		            </span>
		        @endif
		</div>
	</div>
</div>

<div id="pane-add-performance"></div>