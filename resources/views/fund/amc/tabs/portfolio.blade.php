<div role="tabpanel" class="tab-pane" id="portfolio">

<div class="row">
	<div class="col-md-12">
		<div class="well well-sm">
			<a href="{{  route('amc.fund.edit_asset_allocation', $fund->id) }}" class="btn btn-warning pull-right">edit</a>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<canvas id="asset-chart"></canvas>
	</div>
	<div class="col-md-6">
		<table class="table">
			<tr>
				<th>Stock</th>
				<td>{{$fund->asset_allocation != NULL ? $fund->asset_allocation->stock : '-'}}</td>
			</tr>
			<tr>
				<th>Bond</th>
				<td>{{$fund->asset_allocation != NULL ? $fund->asset_allocation->bond : '-'}}</td>
			</tr>
			<tr>
				<th>Cash</th>
				<td>{{$fund->asset_allocation != NULL ? $fund->asset_allocation->cash : '-'}}</td>
			</tr>
			<tr>
				<th>Other</th>
				<td>{{$fund->asset_allocation != NULL ? $fund->asset_allocation->other : '-'}}</td>
			</tr>
		</table>
	</div>
</div>

<hr>

<div class="row">
	<div class="col-md-6">
		<canvas id="holding-chart"></canvas>
	</div>
	<div class="col-md-6">
		<div class="well well-sm">
			<a href="{{ route('amc.fund.create_holding_company', $fund->id) }}" class="btn btn-primary pull-right">Create</a>
			<div class="clearfix"></div>
		</div>

		<table class="table">
			<thead>
				<th>Company Name</th>
				<th>% of Holding</th>
				<th>Actions</th>
			</thead>
			<tbody>
				@foreach($fund->holding_companies as $item)
					<tr>
						<td>{{$item->name}}</td>
						<td>{{$item->percentage}}</td>
						<td>
							{!! Form::open(['route' => ['amc.fund.destroy_holding_company', $item->id], 'method' => 'DELETE']) !!}
								<a href="{{ route('amc.fund.edit_holding_company', $item->id) }}" class="btn btn-xs btn-warning">edit</a>
								{!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger']) !!}
							{!! Form::close() !!}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

</div>
