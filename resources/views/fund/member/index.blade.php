@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Supporter
                        <a data-toggle="collapse" data-target="#filter-pane" class="btn btn-xs btn-info pull-right">Filter</a>
                        <a data-toggle="modal" data-target="#compare-modal" class="btn btn-xs btn-info pull-right">compare</a>
                    </div>

                    <div class="panel-body">
                        <div id="filter-pane" class="collapse">
                            {!! Form::open(['route' => 'member.fund.index', 'method' => 'GET', 'class' => 'form-horizontal']) !!}
                                @include('fund.member.partials._form-search')
                            {!! Form::close() !!}
                        </div>
                    </div>
                    
                    <div class="panel-body">

                            <div class="col-md-6 col-md-offset-6">
                                {!! Form::open(['route' => 'member.fund.index', 'method' => 'GET', 'class' => 'form-horizontal']) !!}
                                <div class="form-group">
                                    {!! Form::label('sort_by', 'Sort By', []) !!}
                                    {!! Form::select('sort_by', ['risk_level' => 'Risk Level',  
                                                                  'name' => 'Fund Name', 
                                                                  'min_first_purchase' => 'Minimum First Purchase', 
                                                                  'nav' => 'Nav'], null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                    {!! Form::radio('desc', false, true, []) !!} low to high
                                    {!! Form::radio('desc', true, false, []) !!} high to low

                                {!! Form::submit('Sort', ['class' => 'btn btn-xs btn-info']) !!}
                                </div>

                                {!! Form::close() !!}
                            </div>

                          <ul id="fund-info-tabs" class="nav nav-tabs">
                            <li class="active"><a href="#show-by-info"        data-toggle="tab">Show by Info</a></li>
                            <li><a href="#show-by-past-performance"           data-toggle="tab">Show by Past Performance</a></li>
                            <li><a href="#show-by-subscription"               data-toggle="tab">Show by subscription and redemption detail</a></li>
                          </ul>

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

@include('fund.member.partials._compare-modal')

@endsection

@section('script')
    <script>        
        var selected = []
        var max_select = 5

        var info_rows = []
        var past_performance_rows = []
        var fee_rows = []

        $('input[name=chckbx]').change(function() {

            if (selected.length < max_select) {
                $(this).prop('checked', !$(this).prop('checked'))
                $('*#'+$(this).attr('id')).each(function() {
                    $(this).prop('checked', !$(this).prop('checked'))
                })
            } else {
                $(this).prop('checked', !$(this).prop('checked'))
                $(this).prop('checked', false)
            }
            
            selectFund($(this).attr('id'))

            function selectFund(val) {
                var idx = $.inArray(val, selected);
                if (idx == -1) {
                    if (selected.length < max_select) {
                        selected.push(val)
                    }
                } else {
                    selected.splice(idx, 1);
                }
            }
        })

        $('#compare-modal').on('shown.bs.modal', function () {
            $( "#compare-detail-body" ).empty()

            $.each(selected, function (key, value) {
                $('*#' + value).each(function() {

                    var tr = $(this).parent().parent().clone(true)
                    tr.children("td.td-actions").remove()
                    tr.children("td.td-chckbx").remove()

                    if ($(this).parent().attr('id') == "chckbx-info") {
                        
                        info_rows.push(tr)

                    } else if ($(this).parent().attr('id') == "chckbx-past-performance") {

                        past_performance_rows.push(tr)

                    } else if ($(this).parent().attr('id') == "chckbx-fee") {

                        fee_rows.push(tr)

                    }

                })
            })

            $( "#compare-detail-body" ).append(info_rows)
            $( "#compare-performance-body" ).append(past_performance_rows)
            $( "#compare-fee-body" ).append(fee_rows)
        })
    </script>

    <script>
        $('#fund-info-tabs a').click(function (e) {
          e.preventDefault()
          $(this).tab('show')
        })
    </script>
@endsection