<div role="tabpanel" class="tab-pane" id="investment-policy">

<div class="row">
	<div class="col-md-12">
		<div class="well well-sm">
			<a class="btn btn-warning pull-right">edit</a>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<table class="table">
			<tr>
				<th>Investment Asset Detail</th>
				<td>{{$fund->investment_asset_detail}}</td>
			</tr>
			<tr>
				<th>Strategy Detail</th>
				<td>{{$fund->strategy_detail}}</td>
			</tr>
			<tr>
				<th>Factor Impact Detail</th>
				<td>{{$fund->factor_impact}}</td>
			</tr>
			<tr>
				<th>Benchmark Detail</th>
				<td>{{$fund->benchmark_detail}}</td>
			</tr>
		</table>
	</div>
</div>

</div>