<div role="tabpanel" class="tab-pane active" id="historical-dividend-payment">

<div class="row">
	<div class="col-md-12">
		<div class="well well-sm">
			<a href="{{ route('amc.fund.create_dividend', $fund->id) }}" class="btn btn-primary pull-right">Create</a>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
					<th colspan="3">History of dividend (Baht/Unit)</th>
					<th></th>
			</thead>
			<thead>
				<th>Year</th>
				<th>Payment Date</th>
				<th>Dividend (Bath/Unit)</th>
				<th>Actions</th>
			</thead>
			<tbody>
				@foreach($fund->dividend_payments as $item)
					<tr>
						<td>{{$item->getYear()}}</td>
						<td>{{$item->payment_date}}</td>
						<td>{{$item->dividend_price}}</td>
						<td>
							{!! Form::open(['route' => ['amc.fund.destroy_dividend', $item->id], 'method' => 'DELETE']) !!}
								<a href="{{ route('amc.fund.edit_dividend', $item->id) }}" class="btn btn-xs btn-warning">edit</a>
								{!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger']) !!}
							{!! Form::close() !!}
						</td>
					</tr>
				@endforeach
				<tr>
					<td colspan="2">Total Dividend</td>
					<td>{{$fund->dividend_payments->sum('dividend_price')}}</td>
				</tr>
				<tr>
					<td colspan="2">The frequency dividend</td>
					<td>{{$fund->dividend_payments->count()}}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

</div>