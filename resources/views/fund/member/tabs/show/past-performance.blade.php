<div role="tabpanel" class="tab-pane" id="past-performance">

  	<table class="table">
  		<thead>
  			<th>Modified Date</th>
  			<th>Past Performance Name</th>
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

@foreach($fund->past_performances as $item)
<!-- Modal -->
<div class="modal fade" id="past-performance-{{$item->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
      	<table class="table table-bordered">
      		<thead>
      			<tr>
	      			<th rowspan="3"></th>
	      			<th colspan="7" style="text-align: center;">Past Performance as of {{$item->date}}</th>
      			</tr>
      			<tr>
      				<th colspan="2" style="text-align: center;">% of each period</th>
      				<th colspan="5" style="text-align: center;">% per year</th>
      			</tr>
      			<tr>
      				<th style="text-align: center;">3 M</th>
      				<th style="text-align: center;">6 M</th>
      				<th style="text-align: center;">1 Y</th>
      				<th style="text-align: center;">3 Y</th>
      				<th style="text-align: center;">5 Y</th>
      				<th style="text-align: center;">10 Y</th>
      				<th style="text-align: center;">Since Inception</th>
      			</tr>
      		</thead>
      		<tbody>
      			@foreach($item->records as $record)
      				<tr align="center">
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
