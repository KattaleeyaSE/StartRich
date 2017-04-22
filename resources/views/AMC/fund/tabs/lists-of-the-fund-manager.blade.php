<div role="tabpanel" class="tab-pane" id="lists-of-the-fund-manager">

<div class="row">
	<div class="col-md-12">
		<div class="well well-sm">
			<a href="{{ route('amc.fund.create_manager', $fund->id) }}" class="btn btn-primary pull-right">Create</a>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<th>Manager Name</th>
				<th>Position</th>
				<th>Date of Management</th>
				<th>Actions</th>
			</thead>
			<tbody>
				@foreach($fund->fund_managers as $item)
					<tr>
						<td>{{$item->name}}</td>
						<td>{{$item->position}}</td>
						<td>{{$item->management_date}}</td>
						<td>
							{!! Form::open(['route' => ['amc.fund.destroy_manager', $item->id], 'method' => 'DELETE']) !!}
								<a href="{{ route('amc.fund.edit_manager', $item->id) }}" class="btn btn-xs btn-warning">edit</a>
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