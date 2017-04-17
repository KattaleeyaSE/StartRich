<div role="tabpanel" class="tab-pane" id="show-by-subscription">

<div class="row">
	<div class="col-md-12">
        <table class="table">
            <thead>
                <th></th>
                <th>Fund code</th>
                <th>Fund name</th>
                <th>Actual Front End Fee</th>
                <th>Actual Back End Fee</th>
                <th>Actual Manager Fee</th>
                <th>Total Expense Ratio</th>
                <th>Minimum Value First Purchase</th>
                <th>Minimum Additional</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach($funds as $fund)
                    <tr>
                        <td>{!! Form::checkbox('x', 0, 0, []) !!}</td>
                        <td>{{$fund->code}}</td>
                        <td>{{$fund->name}}</td>
                        <td>{{ !(is_null($fund->fees->first())) ? $fund->fees->first()->actual_front_end_fee : '-'}}</td>
                        <td>{{ !(is_null($fund->fees->first())) ? $fund->fees->first()->actual_back_end_fee : '-'}}</td>
                        <td>{{ !(is_null($fund->expenses->first())) ? $fund->expenses->first()->actual_manager_fee : '-'}}</td>
                        <td>{{ !(is_null($fund->expenses->first())) ? $fund->expenses->first()->total_expense_ratio : '-'}}</td>
                        <td>{{ !(is_null($fund->purchase_details->first())) ? $fund->purchase_details->first()->min_first_purchase : '-'}}</td>
                        <td>{{ !(is_null($fund->purchase_details->first())) ? $fund->purchase_details->first()->min_additional : '-'}}</td>
                        <td>
                            <a href="{{ route('member.fund.show', $fund->id) }}" class="btn btn-xs btn-info">view</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
	</div>
</div>

</div>