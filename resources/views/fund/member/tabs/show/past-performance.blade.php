<div role="tabpanel" class="tab-pane" id="past-performance">

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
								<a class="btn btn-xs btn-info" data-toggle="modal" data-target="#past-performance-{{$item->id}}">view</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
    <div id="curve_chart"></div>
	</div>
</div>

</div>

@foreach($fund->past_performances as $item)
<!-- Modal -->
<div class="modal fade" id="past-performance-{{$item->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">

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
