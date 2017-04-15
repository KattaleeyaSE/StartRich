<div role="tabpanel" class="tab-pane active" id="nav-daily">

<div class="row">
	<div class="col-md-12">
		<div class="well well-sm">
			<a href="{{ route('amc.fund.create_nav', $fund->id) }}" class="btn btn-primary pull-right">Create</a>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<th>Modified date</th>
				<th>NAV Standard</th>
				<th>NAV bid</th>
				<th>NAV offer</th>
				<th>Change of nav standard</th>
				<th>Change of NAV bid</th>
				<th>Change of NAV offer</th>
				<th>Actions</th>
			</thead>
			<tbody>
				@foreach($fund->navs as $item)
					<tr>
						<td>{{$item->modified_date}}</td>
						<td>{{$item->standard}}</td>
						<td>{{$item->bid}}</td>
						<td>{{$item->offer}}</td>
						<td>{{isset($temp_standard) ? $item->standard - $temp_standard : '-' }}</td>
						<td>{{isset($temp_bid) ? $item->bid - $temp_bid : '-' }}</td>
						<td>{{isset($temp_offer) ? $item->offer - $temp_offer : '-' }}</td>
						<td>
							{!! Form::open(['route' => ['amc.fund.destroy_nav', $item->id], 'method' => 'DELETE']) !!}
								<a href="{{ route('amc.fund.edit_nav', $item->id) }}" class="btn btn-xs btn-warning">edit</a>
								{!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger']) !!}
							{!! Form::close() !!}
						</td>
					</tr>

					@php
						$temp_standard = $item->standard;
						$temp_bid = $item->bid;
						$temp_offer = $item->offer;
					@endphp

				@endforeach
			</tbody>
		</table>
		<div id="chart_div"></div>
	</div>
</div>

</div>
