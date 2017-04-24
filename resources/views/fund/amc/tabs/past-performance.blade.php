<div role="tabpanel" class="tab-pane" id="past-performance">

<div class="row">
	<div class="col-md-12">
		<div class="well well-sm">
			<a href="{{ route('amc.fund.create_past_performance', $fund->id) }}" class="btn btn-primary pull-right">Create</a>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<th>Modified date</th>
				<th>past performance name</th>
				<th>Actions</th>
			</thead>
			<tbody>
				@foreach($fund->past_performances as $item)
					<tr>
						<td>{{$item->updated_at	}}</td>
						<td>{{$item->date}}</td>
						<td>
							{!! Form::open(['route' => ['amc.fund.destroy_past_performance', $item->id], 'method' => 'DELETE']) !!}
								<a class="btn btn-xs btn-info" data-toggle="modal" data-target="#past-performance-{{$item->id}}">view</a>
								{!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger']) !!}
							{!! Form::close() !!}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
    <canvas id="performance-chart"></canvas>
	</div>
</div>

</div>

@foreach($fund->past_performances as $item)
<!-- Modal -->
<div class="modal fade" id="past-performance-{{$item->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
		
		<a href="{{ route('amc.fund.edit_past_performance', $fund->id) }}" class="btn btn-warning pull-right">Edit</a>

      	<table class="table table-bordered">
      		<thead>
      			<tr>
	      			<th rowspan="3"></th>
	      			<th colspan="7">Past Performance as of {{$item->date}}</th>
      			</tr>
      			<tr>
      				<th colspan="2">% of each period</th>
      				<th colspan="5">% per year</th>
      			</tr>
      			<tr>
      				<th>3 M</th>
      				<th>6 M</th>
      				<th>1 Y</th>
      				<th>3 Y</th>
      				<th>5 Y</th>
      				<th>10 Y</th>
      				<th>Since Inception</th>
      			</tr>
      		</thead>
      		<tbody>
      			@foreach($item->records as $record)
      				<tr>
      					<th>{{$record->name}}</th>
      					<td>{{$record->three_month}}</td>
      					<td>{{$record->six_month}}</td>
      					<td>{{$record->one_year}}</td>
      					<td>{{$record->three_year}}</td>
      					<td>{{$record->five_year}}</td>
      					<td>{{$record->ten_year}}</td>
      					<td>{{$record->since_inception}}</td>
      				</tr>
      			@endforeach
      		</tbody>
      	</table>
      </div>
    </div>
  </div>
</div>
@endforeach
