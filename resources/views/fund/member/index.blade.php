@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Fund</div>
                    <div class="container">
                        {!! Form::open(['route' => 'member.fund.index', 'method' => 'GET', 'class' => 'form-inline']) !!}

                            <div class="form-group">
                                {!! Form::label('name', 'Fund Name', []) !!}    
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('code', 'Fund Code', []) !!}    
                                {!! Form::text('code', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('type', 'General Fund Yype', []) !!}    
                                {!! Form::select('type', $fund_types, null, ['class' => 'form-control', 'placeholder' => '']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('protected_fund', 'Protected Fund', ['class' => 'control-label']) !!}
                                {!! Form::select('protected_fund', [1 => 'Have', 0 => 'Not Have'], null, ['class' => 'form-control', 'placeholder' => '']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('payment_policy', 'Payment Policy', ['class' => 'control-label']) !!}
                                {!! Form::select('payment_policy', [1 => 'Have', 0 => 'Not Have'], null, ['class' => 'form-control', 'placeholder' => '']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('risk_level', 'Risk Level', ['class' => 'control-label']) !!}
                                {!! Form::select('risk_level', [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8], null, ['class' => 'form-control', 'placeholder' => '']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('min_first_purchase', 'min_first_purchase', ['class' => 'control-label']) !!}
                                {!! Form::text('min_first_purchase', null, ['class' => 'form-control']) !!}
                            </div>

                          {!! Form::submit('Search', ['class' => 'btn btn-primary']) !!}

                        {!! Form::close() !!}
                        <a href="{{route('member.fund.index')}}">Clear Filter</a>
                    </div>

                    <hr>

                    <div class="panel-body">

                        <ul id="fund-info-tabs" class="nav nav-tabs">
                          <li class="active"><a href="#show-by-info"        data-toggle="tab">Show by Info</a></li>
                          <li><a href="#show-by-past-performance"           data-toggle="tab">Show by Past Performance</a></li>
                          <li><a href="#show-by-subscription"               data-toggle="tab">Show by subscription and redemption detail</a></li>
                        </ul>

                          <!-- Tab panes -->
                          <div class="tab-content">
                            @include('fund.member.tabs.index.show-by-info')
                            @include('fund.member.tabs.index.show-by-past-performance')
                            @include('fund.member.tabs.index.show-by-subscription')
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Delete Form--}}

@endsection

@section('script')
<script>
    $('#fund-info-tabs a').click(function (e) {
      e.preventDefault()
      $(this).tab('show')
    })
</script>
@endsection