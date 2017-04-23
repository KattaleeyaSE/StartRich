<div id="template-dividend" style="visibility: hidden;">
	<div class="row">
		{!! Form::label('dividends[ROW_INDEX][payment_date]', 'Payment Date', ['class' => 'control-label']) !!}
		{!! Form::date('dividends[ROW_INDEX][payment_date]', null, ['class' => 'form-control']) !!}

		{!! Form::label('dividends[ROW_INDEX][dividend_price]', 'Dividend Price', ['class' => 'control-label']) !!}
		{!! Form::text('dividends[ROW_INDEX][dividend_price]', null, ['class' => 'form-control']) !!}
	</div>
</div>