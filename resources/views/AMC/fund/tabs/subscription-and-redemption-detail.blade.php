<div role="tabpanel" class="tab-pane active" id="subscription-and-redemption-detail">
<a class="btn btn-warning">edit</a>
<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<th>specification front end fee</th>
				<th>actual front end fee</th>
				<th>specification back end fee</th>
				<th>actual back end fee</th>
				<th>Actions</th>
			</thead>
			<tbody>
				@foreach($fund->nav as $item)
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>
							<a class="btn btn-xs btn-warning">edit</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<th>specification manager fee</th>
				<th>actual manager fee</th>
				<th>total expense ratio</th>
			</thead>
			<tbody>
				@foreach($fund->nav as $item)
					<tr>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<th>minimum value first purchase</th>
				<th>minimum additional</th>
			</thead>
			<tbody>
				@foreach($fund->nav as $item)
					<tr>
						<td></td>
						<td></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
</div>