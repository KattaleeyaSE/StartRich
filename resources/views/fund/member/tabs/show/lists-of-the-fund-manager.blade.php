<div role="tabpanel" class="tab-pane" id="lists-of-the-fund-manager">

	<table class="table">
		<thead>
			<th>Manager Name</th>
			<th>Position</th>
			<th>Date of Management</th>
		</thead>
		<tbody>
			@foreach($fund->fund_managers as $item)
				<tr>
					<td>{{$item->name}}</td>
					<td>{{$item->position}}</td>
					<td>{{$item->management_date}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

</div>