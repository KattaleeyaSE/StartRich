<div role="tabpanel" class="tab-pane" id="major-risk-factor">

<div class="row">
	<div class="col-md-12">
		<div class="well well-sm">
			<a href="{{  route('amc.fund.edit_major_risk_factor', $fund->id) }}" class="btn btn-warning pull-right">edit</a>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<table class="table">
			<tr>
				<th>Major Risk Factor</th>
				<td>{{$fund->major_risk_factor}}</td>
			</tr>
		</table>
	</div>
</div>

</div>