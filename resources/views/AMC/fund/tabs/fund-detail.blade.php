<div role="tabpanel" class="tab-pane active" id="fund-detail">

<a class="btn btn-warning">edit</a>

<div class="row">
	<div class="col-md-6">
		<table class="table">
			<tr>
				<th>fund name</th>
				<td>{{$fund->name}}</td>
			</tr>
			<tr>
				<th>fund code</th>
				<td>{{$fund->code}}</td>
			</tr>
			<tr>
				<th>fund type</th>
				<td>{{$fund->type}}</td>
			</tr>
			<tr>
				<th>AIMC type</th>
				<td>{{$fund->aimcfundtype}}</td>
			</tr>
			<tr>
				<th>name of management company</th>
				<td>{{$fund->company_name}}</td>
			</tr>
			<tr>
				<th>trustee</th>
				<td>{{$fund->trustee}}</td>
			</tr>
			<tr>
				<th>dividend payment policy</th>
				<td>{{$fund->Investment_policy}}</td>
			</tr>
			<tr>
				<th>frequency of subscription and redemption</th>
				<td>{{$fund->frequency}}</td>
			</tr>
			<tr>
				<th>fund establishment approved by</th>
				<td>{{$fund->mock}}</td>
			</tr>
			<tr>
				<th>supervision protected fund</th>
				<td>{{$fund->mock}}</td>
			</tr>
			<tr>
				<th>name of guarantor</th>
				<td>{{$fund->mock}}</td>
			</tr>
			<tr>
				<th>registration date</th>
				<td>{{$fund->registered_date}}</td>
			</tr>
			<tr>
				<th>end date</th>
				<td>{{$fund->fund_end}}</td>
			</tr>
			<tr>
				<th>risk level</th>
				<td>{{$fund->risklevel}}</td>
			</tr>
			<tr>
				<th>net asset value</th>
				<td>{{$fund->assetvalue}}</td>
			</tr>
		</table>
	</div>
</div>

</div>