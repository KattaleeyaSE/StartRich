<div role="tabpanel" class="tab-pane" id="show-by-subscription">

<div class="row">
	<div class="col-md-12">
        <table class="table" id="subscription-table">
            <thead>
                <th class="text-center" style="vertical-align: middle;"></th>
                <th class="text-center" style="vertical-align: middle;">Fund</th>
                <th class="text-center" style="vertical-align: middle;">Actual <br> Front End Fee</th>
                <th class="text-center" style="vertical-align: middle;">Actual <br> Back End Fee</th>
                <th class="text-center" style="vertical-align: middle;">Actual <br> Manager Fee</th>
                <th class="text-center" style="vertical-align: middle;">Total <br> Expense Ratio</th>
                <th class="text-center" style="vertical-align: middle;">Min Value <br> First Purchase</th>
                <th class="text-center" style="vertical-align: middle;">Min <br> Additional</th>
                <th class="text-center" style="vertical-align: middle;">Actions</th>
            </thead>
            <tbody>
                @foreach($funds as $fund)
                    <tr align="center">
                        <td id="chckbx-fee" class="td-chckbx" style="vertical-align: middle;">
                            {!! Form::checkbox('chckbx', null, 0, ['id' => 'chckbx'.$fund->id]) !!}
                        </td>
                        <td style="vertical-align: middle;">
                            <strong>{{$fund->aimc_type}}</strong>
                            <br>
                            {{$fund->name}}
                        </td>
                        <td style="vertical-align: middle;">
                            {{ !(is_null($fund->fees->first())) ? $fund->fees->first()->actual_front_end_fee : '-'}}
                        </td>
                        <td style="vertical-align: middle;">
                            {{ !(is_null($fund->fees->first())) ? $fund->fees->first()->actual_back_end_fee : '-'}}
                        </td>
                        <td style="vertical-align: middle;">
                            {{ !(is_null($fund->expenses->first())) ? $fund->expenses->first()->actual_manager_fee : '-'}}
                        </td>
                        <td style="vertical-align: middle;">
                            {{ !(is_null($fund->expenses->first())) ? $fund->expenses->first()->total_expense_ratio : '-'}}
                        </td>
                        <td style="vertical-align: middle;">
                            {{ !(is_null($fund->purchase_details->first())) ? $fund->purchase_details->first()->min_first_purchase : '-'}}
                        </td>
                        <td style="vertical-align: middle;">
                            {{ !(is_null($fund->purchase_details->first())) ? $fund->purchase_details->first()->min_additional : '-'}}
                        </td>
                        <td style="vertical-align: middle;" class="td-actions">
                            {!! Form::open(['route' => ['member.fund.favorite', $fund->id], 'method' => 'PATCH']) !!}
                                @if($fund->isFavoriteBy(Auth::user()->member->id))
                                    {!! Form::submit('remove favorite', ['class' => 'btn btn-xs btn-warning']) !!}
                                @else
                                    {!! Form::submit('add favorite', ['class' => 'btn btn-xs btn-info']) !!}
                                @endif
                                <a href="{{ route('member.fund.review', $fund->id) }}" class="btn btn-xs btn-info">review</a>
                                <a href="{{ route('member.fund.show', $fund->id) }}" class="btn btn-xs btn-info">view</a>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
	</div>
</div>

</div>