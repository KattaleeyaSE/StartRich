@extends('layouts.app')
@section('content')
    <div class="container-fluid">
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
                          <ul id="fund-info-tabs" class="nav nav-tabs">
                            <li class="active"><a href="#show-by-info"        data-toggle="tab">Info</a></li>
                            <li><a href="#show-by-past-performance"           data-toggle="tab">Past Performance</a></li>
                            <li><a href="#show-by-subscription"               data-toggle="tab">Subscription & Redemption Detail</a></li>
                            <!-- <li><a href="#show-by-portfolio"                  data-toggle="tab">Portflio</a></li> -->
                          </ul>

                          <div class="tab-content">
                            @include('fund.member.tabs.index.show-by-info')
                            @include('fund.member.tabs.index.show-by-past-performance')
                            @include('fund.member.tabs.index.show-by-subscription')
                            @include('fund.member.tabs.index.show-by-portfolio')
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
        var portfolio_rows = []

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
            $( "#compare-performance-body" ).empty()
            $( "#compare-fee-body" ).empty()
            $( "#compare-portfolio-body" ).empty()

            info_rows = []
            past_performance_rows = []
            fee_rows = []
            portfolio_rows = []

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

                    } else if ($(this).parent().attr('id') == "chckbx-portfolio") {

                        portfolio_rows.push(tr)

                    }

                })
            })

            $( "#compare-detail-body" ).append(info_rows)
            $( "#compare-performance-body" ).append(past_performance_rows)
            $( "#compare-fee-body" ).append(fee_rows)
            $( "#compare-portfolio-body" ).append(portfolio_rows)
        })
    </script>

    <script>
        $('#fund-info-tabs a').click(function (e) {
          e.preventDefault()
          $(this).tab('show')
        })
    </script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#info-table').DataTable({
              "bFilter": false, 
              "paging": false
            });
            $('#performance-table').DataTable({
              "bFilter": false, 
              "paging": false
            });
            $('#subscription-table').DataTable({
              "bFilter": false, 
              "paging": false
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      $("#fund-name-select").select2({
            theme: "bootstrap"
        });
      $("#fund-code-select").select2({
            theme: "bootstrap"
        });
      $("#fund-amc-select").select2({
            theme: "bootstrap"
        });
    });
</script>
@endsection

@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endsection