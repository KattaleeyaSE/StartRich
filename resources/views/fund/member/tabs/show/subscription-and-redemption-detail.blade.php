<div role="tabpanel" class="tab-pane" id="subscription-and-redemption-detail">

	<table class="table">
		<thead>
			<th style="text-align: center;">Specification Front End</th>
			<th style="text-align: center;">Actual Front End</th>
			<th style="text-align: center;">SpecificationBack End</th>
			<th style="text-align: center;">Actual Back End</th>
			<th style="text-align: center;">Specification Switching</th>
		</thead>
		<tbody>
			@foreach($fund->fees as $item)
				<tr align="center">
					<td>{{$item->front_end_fee}}</td>
					<td>{{$item->actual_front_end_fee}}</td>
					<td>{{$item->back_end_fee}}</td>
					<td>{{$item->actual_back_end_fee}}</td>
					<td>{{$item->switching_fee}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<table class="table">
		<thead>
			<th style="text-align: center;">Specification Manager</th>
			<th style="text-align: center;">Actual Manager</th>
			<th style="text-align: center;">Total Expense Ratio</th>
			<th style="text-align: center;">Specification Trustee</th>
			<th style="text-align: center;">Actual Trustee</th>
			<th style="text-align: center;">Specification Registrar</th>
			<th style="text-align: center;">Actual Registrar</th>
			<th style="text-align: center;">Other</th>
		</thead>
		<tbody>
			@foreach($fund->expenses as $item)
				<tr align="center">
					<td>{{$item->manager_fee}}</td>
					<td>{{$item->actual_manager_fee}}</td>
					<td>{{$item->total_expense_ratio}}</td>
					<td>{{$item->trustee_fee}}</td>
					<td>{{$item->actual_trustee_fee}}</td>
					<td>{{$item->registrar_fee}}</td>
					<td>{{$item->actual_registrar_fee}}</td>
					<td>{{$item->other_fee}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<table class="table">
		<thead>
			<th style="text-align: center;">Subscription Period</th>
			<th style="text-align: center;">Min First Purchase</th>
			<th style="text-align: center;">Min Additional</th>
			<th style="text-align: center;">Redemtion Period</th>
			<th style="text-align: center;">Min Redemption</th>
			<th style="text-align: center;">Min Balance</th>
			<th style="text-align: center;">Settlement Period</th>
		</thead>
		<tbody>
			@foreach($fund->purchase_details as $item)
				<tr align="center">
					<td>{{$item->subscription_period}}</td>
					<td>{{$item->min_first_purchase}}</td>
					<td>{{$item->min_additional}}</td>
					<td>{{$item->redemtion_period}}</td>
					<td>{{$item->min_redemption}}</td>
					<td>{{$item->min_balance}}</td>
					<td>{{$item->settlement_period}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	
</div>