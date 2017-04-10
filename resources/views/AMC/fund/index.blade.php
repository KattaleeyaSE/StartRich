@extends('layouts.app')
@section('style')
    <style>
        .div-table {
            background-color: #EEEEEE;
            float: left;
            padding: 30px;
            width: auto;
        }

        .tab-row {
            float: left;
            width: 800px;
        }

        .cell {
            border: 1px solid;
            float: left;
            padding: 5px;
            width: 100px;
        }
    </style>
    @endsection
@section('content')
    <div class="container" ng-controller="fundController">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">AMC : Fund Management</div>
                    <div class="panel-body">
                        <a href="{{url('/amc/create')}}" class="btn btn-success">Create</a>
                    </div>
                    <div class="panel-body">

                        <table align="center" border="1" style="text-align: center;width:100%">
                            <tr >
                                <th style="text-align: center">Name</th>
                                <th style="text-align: center">NAV</th>
                                <th style="text-align: center">Pass Performance
                                <table style="text-align: center;width:100%" border="1">
                                    <tr>
                                        <td>1 month</td>
                                        <td>1 year</td>
                                    </tr>

                                </table>
                                </th>
                                <th style="text-align: center">Asset Value</th>
                                <th style="text-align: center">Last Updates</th>
                            </tr>

                                <tr ng-repeat="item in fund">
                                    <td><%item.name%></td>
                                    <td> 0.000</td>
                                    <td>  <table style="text-align: center;width:100%" border="1">
                                            <tr>
                                                <td>1%</td>
                                                <td>2%</td>
                                            </tr>

                                        </table></td>
                                    <td><% item.assetvalue.toLocaleString() %> THB</td>
                                    <td><% now %></td>
                                </tr>



                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Delete Form--}}

@endsection
@section('script')
    <script src="/js/angular/fund/controller.js"></script>
@endsection