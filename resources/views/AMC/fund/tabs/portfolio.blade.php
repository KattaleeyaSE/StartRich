<div role="tabpanel" class="tab-pane active" id="portfolio">

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
		@if ($fund->asset_allocation != NULL)
    		<div id="piechart_3d"></div>
    	@else
    		<div class="well">
    			No data
    		</div>
    	@endif
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

</div>
