@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Favorite Funds
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