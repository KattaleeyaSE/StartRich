<div role="tabpanel" class="tab-pane" id="show-by-past-performance">

<div class="row">
	<div class="col-md-12">
        <table class="table">
            <thead>
                <th></th>
                <th>Fund code</th>
                <th>Fund name</th>
                <th>1 Month</th>
                <th>3 Months</th>
                <th>1 Year</th>
                <th>3 Years</th>
                <th>5 Years</th>
                <th>10 Years</th>
                <th>Since Inception</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach($funds as $fund)
                    <tr>
                        <td>{!! Form::checkbox('chckbx', json_encode($fund->getAttributes()), 0, ['id' => 'chckbx'.$fund->id]) !!}</td>
                        <td>{{$fund->code}}</td>
                        <td>{{$fund->name}}</td>
                        <td>{{ !(is_null($fund->lastPastPerforamce())) ? $fund->lastPastPerforamce()->fundReturn()->threemonth : '-'}}</td>
                        <td>{{ !(is_null($fund->lastPastPerforamce())) ? $fund->lastPastPerforamce()->fundReturn()->sixmonth : '-'}}</td>
                        <td>{{ !(is_null($fund->lastPastPerforamce())) ? $fund->lastPastPerforamce()->fundReturn()->oneyear : '-'}}</td>
                        <td>{{ !(is_null($fund->lastPastPerforamce())) ? $fund->lastPastPerforamce()->fundReturn()->threeyear : '-'}}</td>
                        <td>{{ !(is_null($fund->lastPastPerforamce())) ? $fund->lastPastPerforamce()->fundReturn()->fiveyear : '-'}}</td>
                        <td>{{ !(is_null($fund->lastPastPerforamce())) ? $fund->lastPastPerforamce()->fundReturn()->tenyear : '-'}}</td>
                        <td>{{ !(is_null($fund->lastPastPerforamce())) ? $fund->lastPastPerforamce()->fundReturn()->since_inception : '-'}}</td>
                        <td>
                            {!! Form::open(['route' => ['member.fund.favorite', $fund->id], 'method' => 'PATCH']) !!}
                                @if($fund->isFavoriteBy(Auth::user()->member->id))
                                    {!! Form::submit('remove favorite', ['class' => 'btn btn-xs btn-warning']) !!}
                                @else
                                    {!! Form::submit('add favorite', ['class' => 'btn btn-xs btn-info']) !!}
                                @endif
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