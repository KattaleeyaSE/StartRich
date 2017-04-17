@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Supporter
                        <a data-toggle="collapse" data-target="#filter-pane" class="btn btn-xs btn-info pull-right">Filter</a>
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
@endsection

@section('script')
    <script>
        $('#fund-info-tabs a').click(function (e) {
          e.preventDefault()
          $(this).tab('show')
        })
    </script>
@endsection