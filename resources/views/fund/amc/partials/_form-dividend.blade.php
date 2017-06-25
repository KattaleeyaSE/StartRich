<a class="btn btn-primary" id="btn-add-dividend"> + </a>

	<div class="row">

		<div class="form-group{{ $errors->has('dividends.*.payment_date') ? ' has-error' : '' }}">
		    {!! Form::label('dividends[0][payment_date]', 'Payment Date *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
		    <div class="col-md-6 col-sm-6 col-xs-12">
		    {!! Form::date('dividends[0][payment_date]', null,['class' => 'form-control col-md-7 col-xs-12 required']) !!}
		    <div class="help-block with-errors"></div>
		    </div>
		        @if ($errors->has('dividends.*.payment_date'))
		            <span class="help-block">
		                <strong>{{ $errors->first('dividends.*.payment_date') }}</strong>
		            </span>
		        @endif
		</div>
		<div class="form-group{{ $errors->has('dividends.*.dividend_price') ? ' has-error' : '' }}">
		    {!! Form::label('dividends[0][dividend_price]', 'Dividend Price *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
		    <div class="col-md-6 col-sm-6 col-xs-12">
		    {!! Form::text('dividends[0][dividend_price]', null,['class' => 'form-control col-md-7 col-xs-12 required', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		    </div>
		        @if ($errors->has('dividends.*.dividend_price'))
		            <span class="help-block">
		                <strong>{{ $errors->first('dividends.*.dividend_price') }}</strong>
		            </span>
		        @endif
		</div>
			
	</div>

<div id="pane-add-dividend"></div>