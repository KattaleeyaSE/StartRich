<div role="tabpanel" class="tab-pane active" id="types-of-investor">

<a class="btn btn-warning">edit</a>

<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<th>Modified date</th>
				<th>NAV Standard</th>
				<th>NAV bid</th>
				<th>NAV offer</th>
				<th>Change of nav standard</th>
				<th>Change of NAV bit</th>
				<th>Change of NAV offer</th>
				<th>Actions</th>
			</thead>
			<tbody>
				@foreach($fund->nav as $item)
					<tr>
						<td>{{$item->updated_at}}</td>
						<td>{{$item->standard}}</td>
						<td>{{$item->bid}}</td>
						<td>{{$item->offer}}</td>
						<td></td>
						<td></td>
						<td></td>
						<td>
							<a class="btn btn-xs btn-warning">edit</a>
							<a class="btn btn-xs btn-danger">delete</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div id="chart_div"></div>
	</div>
</div>

</div>

@section('script')
 	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 	<script type="text/javascript">
 		google.charts.load('current', {packages: ['corechart', 'line']});
		google.charts.setOnLoadCallback(drawBackgroundColor);

		function drawBackgroundColor() {
		      var data = new google.visualization.DataTable();
		      data.addColumn('string', 'X');
		      data.addColumn('number', 'Price');

		      data.addRows({!!json_encode($navs)!!});

		      var options = {
		        hAxis: {
		          title: 'Modified date'
		        },
		        vAxis: {
		          title: 'Price (Bath)'
		        },
		        backgroundColor: '#f1f8e9'
		      };

		      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
		      chart.draw(data, options);
		    }
 	</script>
@endsection