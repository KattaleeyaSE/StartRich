<div role="tabpanel" class="tab-pane" id="subscription-and-redemption-detail">

<div class="row">
	<div class="col-md-12">
		<div class="well well-sm">
			<a href="{{ route('amc.fund.create_fee', $fund->id) }}" class="btn btn-primary pull-right">Create</a>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<th>specification front end fee</th>
				<th>actual front end fee</th>
				<th>specification back end fee</th>
				<th>actual back end fee</th>
				<th>specification switching fee</th>
				<th>Actions</th>
			</thead>
			<tbody>
				@foreach($fund->fees as $item)
					<tr>
						<td>{{$item->front_end_fee}}</td>
						<td>{{$item->actual_front_end_fee}}</td>
						<td>{{$item->back_end_fee}}</td>
						<td>{{$item->actual_back_end_fee}}</td>
						<td>{{$item->switching_fee}}</td>
						<td>
							<a href="{{ route('amc.fund.edit_fee', $item->id) }}" class="btn btn-xs btn-warning">edit</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="well well-sm">
			<a href="{{ route('amc.fund.create_expense', $fund->id) }}" class="btn btn-primary pull-right">Create</a>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<th>specification manager fee</th>
				<th>actual manager fee</th>
				<th>total expense ratio</th>
				<th>specification trustee fee</th>
				<th>actual trustee fee</th>
				<th>specification registrar fee</th>
				<th>actual registrar fee</th>
				<th>other fee</th>
				<th>Actions</th>
			</thead>
			<tbody>
				@foreach($fund->expenses as $item)
					<tr>
						<td>{{$item->manager_fee}}</td>
						<td>{{$item->actual_manager_fee}}</td>
						<td>{{$item->total_expense_ratio}}</td>
						<td>{{$item->trustee_fee}}</td>
						<td>{{$item->actual_trustee_fee}}</td>
						<td>{{$item->registrar_fee}}</td>
						<td>{{$item->actual_registrar_fee}}</td>
						<td>{{$item->other_fee}}</td>
						<td>
							<a href="{{ route('amc.fund.edit_fee', $item->id) }}" class="btn btn-xs btn-warning">edit</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="well well-sm">
			<a href="{{ route('amc.fund.create_purchase_detail', $fund->id) }}" class="btn btn-primary pull-right">Create</a>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<th>subscription_period</th>
				<th>min_first_purchase</th>
				<th>min_additional</th>
				<th>redemtion_period</th>
				<th>min_redemption</th>
				<th>min_balance</th>
				<th>settlement_period</th>
				<th>Actions</th>
			</thead>
			<tbody>
				@foreach($fund->purchase_details as $item)
					<tr>
						<td>{{$item->subscription_period}}</td>
						<td>{{$item->min_first_purchase}}</td>
						<td>{{$item->min_additional}}</td>
						<td>{{$item->redemtion_period}}</td>
						<td>{{$item->min_redemption}}</td>
						<td>{{$item->min_balance}}</td>
						<td>{{$item->settlement_period}}</td>
						<td>
							<a href="{{ route('amc.fund.edit_purchase_detail', $item->id) }}" class="btn btn-xs btn-warning">edit</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
</div>