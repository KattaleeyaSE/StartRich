<div role="tabpanel" class="tab-pane active" id="show-by-info">

<div class="row">
	<div class="col-md-12">
        <table class="table">
            <thead>
                <th></th>
                <th>Fund code</th>
                <th>Fund name</th>
                <th>Fund normal type</th>
                <th>StartRich Rate</th>
                <th>Dividend Policy</th>
                <th>NAV</th>
                <th>Last percentage of return per 1 year</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach($funds as $fund)
                    <tr>
                        <td id="chckbx-info" class="td-chckbx">{!! Form::checkbox('chckbx', json_encode($fund->getAttributes()), 0, ['id' => 'chckbx'.$fund->id]) !!}</td>
                        <td>{{$fund->code}}</td>
                        <td>{{$fund->name}}</td>
                        <td>{{$fund->type}}</td>
                        <td>{{$fund->getRate()}}</td>
                        <td>{{$fund->payment_policy ? 'YES' : 'NO'}}</td>
                        <td>{{ !(is_null($fund->navs->first())) ? $fund->navs->first()->standard : '-'}}</td>
                        <td>{{ !(is_null($fund->lastPastPerforamce())) ? $fund->lastPastPerforamce()->fundReturn()->oneyear : '-'}}</td>
                        <td class="td-actions">
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