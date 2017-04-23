<div role="tabpanel" class="tab-pane" id="historical-dividend-payment">

	<table class="table table-bordered">
		<thead>
				<th colspan="3" style="text-align: center;">History of dividend (Baht/Unit)</th>
		</thead>
		<thead>
			<th style="text-align: center;">Year</th>
			<th style="text-align: center;">Payment Date</th>
			<th style="text-align: center;">Dividend (Bath/Unit)</th>
		</thead>
		<tbody>
			@foreach($fund->dividend_payments as $item)
				<tr align="center">
					<td>{{$item->getYear()}}</td>
					<td>{{$item->payment_date}}</td>
					<td>{{$item->dividend_price}}</td>
				</tr>
			@endforeach
			<tr align="center">
				<td colspan="2">Total Dividend</td>
				<td>{{$fund->dividend_payments->sum('dividend_price')}}</td>
			</tr>
			<tr align="center">
				<td colspan="2">The frequency dividend</td>
				<td>{{$fund->dividend_payments->count()}}</td>
			</tr>
		</tbody>
	</table>

</div>