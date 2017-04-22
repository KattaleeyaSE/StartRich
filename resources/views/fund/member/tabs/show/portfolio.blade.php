<div role="tabpanel" class="tab-pane" id="portfolio">

<div class="row">
	<div class="col-md-6">
    	<div id="piechart_3d"></div>
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
    	<div id="piechart_3d_holding_company"></div>
	</div>
	<div class="col-md-6">

		<table class="table">
			<thead>
				<th>Company Name</th>
				<th>% of Holding</th>
			</thead>
			<tbody>
				@foreach($fund->holding_companies as $item)
					<tr>
						<td>{{$item->name}}</td>
						<td>{{$item->percentage}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

</div>
