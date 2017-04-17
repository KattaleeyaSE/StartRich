<div role="tabpanel" class="tab-pane active" id="fund-detail">

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
				<td>{{$fund->aimc_type}}</td>
			</tr>
			<tr>
				<th>name of management company</th>
				<td>{{$fund->management_company}}</td>
			</tr>
			<tr>
				<th>trustee</th>
				<td>{{$fund->trustee}}</td>
			</tr>
			<tr>
				<th>dividend payment policy</th>
				<td>{{$fund->payment_policy ? 'YES' : 'NO'}}</td>
			</tr>
			<tr>
				<th>frequency of subscription and redemption</th>
				<td>{{$fund->frequency}}</td>
			</tr>
		</table>
	</div>
	<div class="col-md-6">
		<table class="table">
			<tr>
				<th>fund establishment approved by</th>
				<td>{{$fund->approved_by}}</td>
			</tr>
			<tr>
				<th>supervision</th>
				<td>{{$fund->supervision}}</td>
			</tr>
			<tr>
				<th>protected fund</th>
				<td>{{$fund->protected_fund ? 'YES' : 'NO'}}</td>
			</tr>
			<tr>
				<th>name of guarantor</th>
				<td>{{$fund->name_of_guarantor}}</td>
			</tr>
			<tr>
				<th>start date</th>
				<td>{{$fund->fund_start}}</td>
			</tr>
			<tr>
				<th>end date</th>
				<td>{{$fund->fund_end}}</td>
			</tr>
			<tr>
				<th>risk level</th>
				<td>{{$fund->risk_level}}</td>
			</tr>
			<tr>
				<th>net asset value</th>
				<td>{{$fund->net_asset_value}}</td>
			</tr>
		</table>
	</div>
</div>

</div>