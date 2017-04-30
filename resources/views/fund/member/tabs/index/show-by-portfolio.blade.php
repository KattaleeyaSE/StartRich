<div role="tabpanel" class="tab-pane" id="show-by-portfolio">

<div class="row">
    <div class="col-md-12">
    <table class="table" id="portfolio-table">
    <thead>
        <th class="text-center" style="vertical-align: middle;"></th>
        <th class="text-center" style="vertical-align: middle;">Fund</th>
        <th class="text-center" style="vertical-align: middle;">AIMC Type</th>
        <th class="text-center" style="vertical-align: middle;">% of Stock</th>
        <th class="text-center" style="vertical-align: middle;">% of Bond</th>
        <th class="text-center" style="vertical-align: middle;">% of Cash</th>
        <th class="text-center" style="vertical-align: middle;">% of Other</th>
        <th class="text-center" style="vertical-align: middle;">Actions</th>
    </thead>
    <tbody>
        @foreach($funds as $fund)
            <tr align="center">
                <td id="chckbx-portfolio" class="td-chckbx" style="vertical-align: middle;">{!! Form::checkbox('chckbx', null, 0, ['id' => 'chckbx'.$fund->id]) !!}</td>
                <td style="vertical-align: middle;">
                    <strong>{{$fund->code}}</strong>
                    <br>
                    {{$fund->name}}
                </td>
                <td style="vertical-align: middle;">{{$fund->aimc_type}}</td>
                <td style="vertical-align: middle;">{{ isset($fund->asset_allocation) ? $fund->asset_allocation->stock : '-'}}</td>
                <td style="vertical-align: middle;">{{ isset($fund->asset_allocation) ? $fund->asset_allocation->bond : '-'}}</td>
                <td style="vertical-align: middle;">{{ isset($fund->asset_allocation) ? $fund->asset_allocation->cash : '-'}}</td>
                <td style="vertical-align: middle;">{{ isset($fund->asset_allocation) ? $fund->asset_allocation->other : '-'}}</td>
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