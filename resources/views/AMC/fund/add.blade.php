@extends('layouts.app')

@section('content')
    <div class="container" ng-controller="fundController" >
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">AMC : Create Fund</div>

                    <div class="panel-body">
                        <div>
                            <label>Name:</label>
                            <input ng-model="fund.name" type="text" class="form-control" />

                            <hr>
                            <label>Pay Policy</label>
                            <select>
                                <option>Have</option>
                                <option>Not Have</option>
                            </select>
                        </div>
                        <hr>
                        <div class="form-inline">
                            <label>Type:</label>
                            <select ng-model="fund.normaltype">
                                <option ng-selected="1"
                                        ng-repeat="type in normaltype"
                                        value="<%type.value%>">
                                    <%type.name%>
                                </option>
                            </select>
                            <label>AIMC Type:</label>
                            <select ng-model="fund.type">
                                <option ng-selected="1"
                                        ng-repeat="type in fundtype"
                                        value="<%type.value%>">
                                    <%type.name%>
                                </option>
                            </select>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="/js/angular/fund/controller.js"></script>
@endsection