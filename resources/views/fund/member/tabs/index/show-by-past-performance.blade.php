<div role="tabpanel" class="tab-pane" id="show-by-past-performance">

<div class="row">
	<div class="col-md-12">
        <table class="table">
            <thead>
                <th class="text-center" style="vertical-align: middle;"></th>
                <th class="text-center" style="vertical-align: middle;">Fund</th>
                <th class="text-center" style="vertical-align: middle;">3 Month</th>
                <th class="text-center" style="vertical-align: middle;">6 Months</th>
                <th class="text-center" style="vertical-align: middle;">1 Year</th>
                <th class="text-center" style="vertical-align: middle;">3 Years</th>
                <th class="text-center" style="vertical-align: middle;">5 Years</th>
                <th class="text-center" style="vertical-align: middle;">10 Years</th>
                <th class="text-center" style="vertical-align: middle;">Since <br> Inception</th>
                <th class="text-center" style="vertical-align: middle;">Actions</th>
            </thead>
            <tbody>
                @foreach($funds as $fund)
                    <tr align="center">
                        <td id="chckbx-past-performance" class="td-chckbx" style="vertical-align: middle;">
                            {!! Form::checkbox('chckbx', null, 0, ['id' => 'chckbx'.$fund->id]) !!}
                        </td>
                        <td style="vertical-align: middle;">
                            <strong>{{$fund->aimc_type}}</strong>
                            <br>
                            {{$fund->name}}
                        </td>
                        <td style="vertical-align: middle;">
                            {{ !(is_null($fund->lastPastPerforamce())) ? $fund->lastPastPerforamce()->fundReturn()->threemonth : '-'}}
                        </td>
                        <td style="vertical-align: middle;">
                            {{ !(is_null($fund->lastPastPerforamce())) ? $fund->lastPastPerforamce()->fundReturn()->sixmonth : '-'}}
                        </td>
                        <td style="vertical-align: middle;">
                            {{ !(is_null($fund->lastPastPerforamce())) ? $fund->lastPastPerforamce()->fundReturn()->oneyear : '-'}}
                        </td>
                        <td style="vertical-align: middle;">
                            {{ !(is_null($fund->lastPastPerforamce())) ? $fund->lastPastPerforamce()->fundReturn()->threeyear : '-'}}
                        </td>
                        <td style="vertical-align: middle;">
                            {{ !(is_null($fund->lastPastPerforamce())) ? $fund->lastPastPerforamce()->fundReturn()->fiveyear : '-'}}
                        </td>
                        <td style="vertical-align: middle;">
                            {{ !(is_null($fund->lastPastPerforamce())) ? $fund->lastPastPerforamce()->fundReturn()->tenyear : '-'}}
                        </td>
                        <td style="vertical-align: middle;">
                            {{ !(is_null($fund->lastPastPerforamce())) ? $fund->lastPastPerforamce()->fundReturn()->since_inception : '-'}}
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