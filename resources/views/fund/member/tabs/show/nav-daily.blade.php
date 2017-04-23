<div role="tabpanel" class="tab-pane" id="nav-daily">

	<table class="table">
		<thead>
			<th style="text-align: center;">Modified Date</th>
			<th style="text-align: center;">Standard</th>
			<th style="text-align: center;">Bid</th>
			<th style="text-align: center;">Offer</th>
			<th style="text-align: center;">Change of Standard</th>
			<th style="text-align: center;">Change of Bid</th>
			<th style="text-align: center;">Change of Offer</th>
		</thead>
		<tbody>
			@foreach($fund->navs as $item)
				<tr align="center">
					<td>{{$item->modified_date}}</td>
					<td>{{$item->standard}}</td>
					<td>{{$item->bid}}</td>
					<td>{{$item->offer}}</td>
					<td>{{isset($temp_standard) ? $item->standard - $temp_standard : '-' }}</td>
					<td>{{isset($temp_bid) ? $item->bid - $temp_bid : '-' }}</td>
					<td>{{isset($temp_offer) ? $item->offer - $temp_offer : '-' }}</td>
				</tr>

				@php
					$temp_standard = $item->standard;
					$temp_bid = $item->bid;
					$temp_offer = $item->offer;
				@endphp

			@endforeach
		</tbody>
	</table>

	<canvas id="nav-chart"></canvas>

</div>
