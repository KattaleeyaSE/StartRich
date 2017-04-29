<div role="tabpanel" class="tab-pane active" id="show-by-info">

<div class="row">
	<div class="col-md-12">
        <table class="table" id="info-table">
            <thead>
                <th class="text-center" style="vertical-align: middle;"></th>
                <th class="text-center" style="vertical-align: middle;">Fund</th>
                <th class="text-center" style="vertical-align: middle;">Type</th>
                <th class="text-center" style="vertical-align: middle;">Company</th>
                <th class="text-center" style="vertical-align: middle;">StartRich Rate</th>
                <th class="text-center" style="vertical-align: middle;">Dividend Policy</th>
                <th class="text-center" style="vertical-align: middle;">NAV</th>
                <th class="text-center" style="vertical-align: middle;">Last % of return <br> per year</th>
                <th class="text-center" style="vertical-align: middle;">Actions</th>
            </thead>
            <tbody>
                @foreach($funds as $fund)
                    <tr align="center">
                        <td id="chckbx-info" class="td-chckbx" style="vertical-align: middle;">{!! Form::checkbox('chckbx', null, 0, ['id' => 'chckbx'.$fund->id]) !!}</td>
                        <td style="vertical-align: middle;">
                            <strong>{{$fund->code}}</strong>
                            <br>
                            {{$fund->name}}
                        </td>
                        <td style="vertical-align: middle;">{{$fund->aimc_type}}</td>
                        <td style="vertical-align: middle;">{{$fund->amc->company_name}}</td>
                        <td style="vertical-align: middle;">{{$fund->getRate()}}</td>
                        <td style="vertical-align: middle;">{{$fund->payment_policy ? 'YES' : 'NO'}}</td>
                        <td style="vertical-align: middle;">{{ !(is_null($fund->navs->first())) ? $fund->navs->first()->standard : '-'}}</td>
                        <td style="vertical-align: middle;">{{ !(is_null($fund->lastPastPerforamce())) ? $fund->lastPastPerforamce()->fundReturn()->oneyear : '-'}}</td>
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