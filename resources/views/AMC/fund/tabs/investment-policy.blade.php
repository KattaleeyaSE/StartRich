<div role="tabpanel" class="tab-pane active" id="investment-policy">

<a class="btn btn-warning">edit</a>

<div class="row">
	<div class="col-md-6">
		<table class="table">
			<tr>
				<th>investment asset detail</th>
				<td>{{$fund->name}}</td>
			</tr>
			<tr>
				<th>strategy detail</th>
				<td>{{$fund->code}}</td>
			</tr>
			<tr>
				<th>factor impact detail</th>
				<td>{{$fund->type}}</td>
			</tr>
			<tr>
				<th>benchmark detail</th>
				<td>{{$fund->aimcfundtype}}</td>
			</tr>
		</table>
	</div>
</div>

</div>