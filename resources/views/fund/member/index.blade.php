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
                        <a href="{{ route('member.fund.favorites') }}" class="btn btn-xs btn-info">favorite funds</a>
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

    <div class="modal fade" id="compare-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Compare</h4>
          </div>
          <div class="modal-body">        
              <table class="table">
                <thead>
                    <th>Fund code</th>
                    <th>Fund name</th>
                    <th>Fund normal type</th>
                    <th>StartRich Rate</th>
                    <th>Dividend Policy</th>
                    <th>NAV</th>
                    <th>Last percentage of return per 1 year</th>
                </thead>
                <tbody id="compare-body">
                    <tr id="compare-row"><td>Test</td></tr>
                </tbody>
            </table>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
@endsection

@section('script')
    <script>        
        var selected = []
        var max_select = 10

        $('input[name=chckbx]').change(function() {

            if (selected.length < max_select) {
                $(this).prop('checked', !$(this).prop('checked'))
                $('*#'+$(this).attr('id')).each(function() {
                    $(this).prop('checked', !$(this).prop('checked'))
                })
                selectFund($(this).val())
            } else {
                $(this).prop('checked', !$(this).prop('checked'))
                selectFund($(this).val())
                $(this).prop('checked', false)
            }

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
            $( "#compare-body" ).empty()
            var rows = ''
            $.each(selected, function( index, value ) {
                fund = jQuery.parseJSON(value)
                rows = '<tr><td>'+fund.name+'</td><td>'+fund.code+'</td><td>'+fund.type+'</td><td></td><td>'+fund.payment_policy+'</td>'
                $( "#compare-body" ).append(rows)
            })
        })
    </script>

    <script>
        $('#fund-info-tabs a').click(function (e) {
          e.preventDefault()
          $(this).tab('show')
        })
    </script>
@endsection