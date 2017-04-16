<div role="tabpanel" class="tab-pane active" id="past-performance">

<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<th>Modified date</th>
				<th>past performance name</th>
				<th>Actions</th>
			</thead>
			<tbody>
				@foreach($fund->nav as $item)
					<tr>
						<td></td>
						<td></td>
						<td>
							<a class="btn btn-xs btn-info">view</a>
							<a class="btn btn-xs btn-danger">delete</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

</div>
