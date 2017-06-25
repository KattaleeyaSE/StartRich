<div id="template-performance" style="visibility: hidden;">
	<div class="row">
		<div class="col-md-2">
			<div class="form-group{{ $errors->has('past_performances.*.name') ? ' has-error' : '' }}">
			    {!! Form::label('past_performances[ROW_INDEX][name]', 'Name *', ['class' => 'control-label']) !!}
			    {!! Form::text('past_performances[ROW_INDEX][name]', 'DEFAULT_ROW_NAME',['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$', 'readonly' => 'readonly']) !!}
		    <div class="help-block with-errors"></div>
			        @if ($errors->has('past_performances[ROW_INDEX][name]'))
			            <span class="help-block">
			                <strong>{{ $errors->first('past_performances.*.name') }}</strong>
			            </span>
			        @endif
			</div>
		</div>
		<div class="col-md-1">
			<div class="form-group{{ $errors->has('past_performances.*.3month') ? ' has-error' : '' }}">
			    {!! Form::label('past_performances[ROW_INDEX][3month]', '3 Month *', ['class' => 'control-label']) !!}
			    {!! Form::text('past_performances[ROW_INDEX][3month]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
			        @if ($errors->has('past_performances[ROW_INDEX][3month]'))
			            <span class="help-block">
			                <strong>{{ $errors->first('past_performances.*.3month') }}</strong>
			            </span>
			        @endif
			</div>
		</div>
		<div class="col-md-1">
			<div class="form-group{{ $errors->has('past_performances.*.6month') ? ' has-error' : '' }}">
			    {!! Form::label('past_performances[ROW_INDEX][6month]', '6 Month *', ['class' => 'control-label']) !!}
			    {!! Form::text('past_performances[ROW_INDEX][6month]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
			        @if ($errors->has('past_performances[ROW_INDEX][6month]'))
			            <span class="help-block">
			                <strong>{{ $errors->first('past_performances.*.6month') }}</strong>
			            </span>
			        @endif
			</div>
		</div>
		<div class="col-md-1">
			<div class="form-group{{ $errors->has('past_performances.*.1year') ? ' has-error' : '' }}">
			    {!! Form::label('past_performances[ROW_INDEX][1year]', '1 Year *', ['class' => 'control-label']) !!}
			    {!! Form::text('past_performances[ROW_INDEX][1year]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
			        @if ($errors->has('past_performances[ROW_INDEX][1year]'))
			            <span class="help-block">
			                <strong>{{ $errors->first('past_performances.*.1year') }}</strong>
			            </span>
			        @endif
			</div>
		</div>
		<div class="col-md-1">
			<div class="form-group{{ $errors->has('past_performances.*.3year') ? ' has-error' : '' }}">
			    {!! Form::label('past_performances[ROW_INDEX][3year]', '3 Year *', ['class' => 'control-label']) !!}
			    {!! Form::text('past_performances[ROW_INDEX][3year]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
			        @if ($errors->has('past_performances[ROW_INDEX][3year]'))
			            <span class="help-block">
			                <strong>{{ $errors->first('past_performances.*.3year') }}</strong>
			            </span>
			        @endif
			</div>
		</div>
		<div class="col-md-1">
			<div class="form-group{{ $errors->has('past_performances.*.5year') ? ' has-error' : '' }}">
			    {!! Form::label('past_performances[ROW_INDEX][5year]', '5 Year *', ['class' => 'control-label']) !!}
			    {!! Form::text('past_performances[ROW_INDEX][5year]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
			        @if ($errors->has('past_performances[ROW_INDEX][5year]'))
			            <span class="help-block">
			                <strong>{{ $errors->first('past_performances.*.5year') }}</strong>
			            </span>
			        @endif
			</div>
		</div>
		<div class="col-md-1">
			<div class="form-group{{ $errors->has('past_performances.*.10year') ? ' has-error' : '' }}">
			    {!! Form::label('past_performances[ROW_INDEX][10year]', '10 Year *', ['class' => 'control-label']) !!}
			    {!! Form::text('past_performances[ROW_INDEX][10year]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
			        @if ($errors->has('past_performances[ROW_INDEX][10year]'))
			            <span class="help-block">
			                <strong>{{ $errors->first('past_performances.*.10year') }}</strong>
			            </span>
			        @endif
			</div>
		</div>
		<div class="col-md-1">
			<div class="form-group{{ $errors->has('past_performances.*.since_inception') ? ' has-error' : '' }}">
			    {!! Form::label('past_performances[ROW_INDEX][since_inception]', '10 Year *', ['class' => 'control-label']) !!}
			    {!! Form::text('past_performances[ROW_INDEX][since_inception]', null,['class' => 'form-control required', 'required' => 'required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
			        @if ($errors->has('past_performances[ROW_INDEX][since_inception]'))
			            <span class="help-block">
			                <strong>{{ $errors->first('past_performances.*.since_inception') }}</strong>
			            </span>
			        @endif
			</div>
		</div>
	</div>
</div>