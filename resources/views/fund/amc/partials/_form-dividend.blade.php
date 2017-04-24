<a class="btn btn-primary" id="btn-add-dividend"> + </a>

	<div class="row">

{!! Form::label('dividends[0][payment_date]', 'Payment Date', ['class' => 'control-label']) !!}
{!! Form::date('dividends[0][payment_date]', null, ['class' => 'form-control']) !!}

{!! Form::label('dividends[0][dividend_price]', 'Dividend Price', ['class' => 'control-label']) !!}
{!! Form::text('dividends[0][dividend_price]', null, ['class' => 'form-control']) !!}
			
	</div>

<div id="pane-add-dividend"></div>