<div role="tabpanel" class="tab-pane active" id="lists-of-the-fund-manager">

<a class="btn btn-primary">Create</a>

<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<th>fund manager</th>
				<th>date of fund management</th>
				<th>Actions</th>
			</thead>
			<tbody>
				@foreach($fund->nav as $item)
					<tr>
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
	</div>
</div>

</div>