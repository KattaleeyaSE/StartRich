<div role="tabpanel" class="tab-pane" id="types-of-investor">

<div class="row">
	<div class="col-md-12">
		<div class="well well-sm">
			<a href="{{  route('amc.fund.edit_types_of_investor', $fund->id) }}" class="btn btn-warning pull-right">edit</a>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<table class="table">
			<tr>
				<th>Types of Investor Detail</th>
				<td>{{$fund->type_of_investor}}</td>
			</tr>
		</table>
	</div>
</div>

</div>