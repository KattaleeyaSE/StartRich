<div role="tabpanel" class="tab-pane active" id="fund-detail">

<div class="row">
	<div class="col-md-6">
		<table class="table">
			<tr>
				<th>Fund Name</th>
				<td>{{$fund->name}}</td>
			</tr>
			<tr>
				<th>Fund Code</th>
				<td>{{$fund->code}}</td>
			</tr>
			<tr>
				<th>Fund Type</th>
				<td>{{$fund->type}}</td>
			</tr>
			<tr>
				<th>AIMC Type</th>
				<td>{{$fund->aimc_type}}</td>
			</tr>
			<tr>
				<th>Management Company</th>
				<td>{{$fund->management_company}}</td>
			</tr>
			<tr>
				<th>Trustee</th>
				<td>{{$fund->trustee}}</td>
			</tr>
			<tr>
				<th>Dividend Payment</th>
				<td>{{$fund->payment_policy ? 'YES' : 'NO'}}</td>
			</tr>
			<tr>
				<th>Frequency of Subscription & Redemption</th>
				<td>{{$fund->frequency}}</td>
			</tr>
		</table>
	</div>
	<div class="col-md-6">
		<table class="table">
			<tr>
				<th>Fund Establishment Approved By</th>
				<td>{{$fund->approved_by}}</td>
			</tr>
			<tr>
				<th>Supervision</th>
				<td>{{$fund->supervision}}</td>
			</tr>
			<tr>
				<th>Protected Fund</th>
				<td>{{$fund->protected_fund ? 'YES' : 'NO'}}</td>
			</tr>
			<tr>
				<th>Guarantor</th>
				<td>{{$fund->name_of_guarantor}}</td>
			</tr>
			<tr>
				<th>Start Date</th>
				<td>{{$fund->fund_start}}</td>
			</tr>
			<tr>
				<th>End Date</th>
				<td>{{$fund->fund_end}}</td>
			</tr>
			<tr>
				<th>Risk Level</th>
				<td>{{$fund->risk_level}}</td>
			</tr>
			<tr>
				<th>Net Asset Value</th>
				<td>{{$fund->net_asset_value}}</td>
			</tr>
		</table>
	</div>
</div>

</div>