@extends('layouts.app')

@section('content')
    <div class="container" ng-controller="fundController" >
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">AMC : Create Fund</div>

                    <div ng-hide="page!=1" class="panel-body">
                        <div>
                            <label>Name:</label>
                            <input ng-model="fund.name" type="text" class="form-control" />
                            <label>Company Name:</label>
                            <input ng-model="fund.company_name" type="text" class="form-control" />
                            <label>Detail:</label>
                            <textarea style="width: 100%" ng-model="fund.desc"></textarea>

                            <label>Trustee:</label>
                            <input ng-model="fund.truestee" type="text" class="form-control" />
                            <label>Fequency:</label>
                            <input ng-model="fund.frequency" type="text" class="form-control" />
                            <label> Strategy</label>
                            <textarea style="width: 100%" ng-model="fund.strategy"></textarea>
                            <hr>
                        </div>
                        <div class="form-inline">
                            <label>Asset Value:</label>
                            <input style="margin-right: 10px" ng-model="fund.asset" type="number" class="form-control" />

                            <label>Pay Policy</label>
                            <select>
                                <option>Have</option>
                                <option>Not Have</option>
                            </select>
                            <hr>
                            <label>Registered Date</label>
                            <input type="date" ng-model="fund.registered">

                        </div>
                        <hr>
                        <div class="form-inline">
                            <label>Type:</label>
                            <select ng-model="fund.type">
                                <option ng-selected="1"
                                        ng-repeat="type in normaltype"
                                        value="<%type.value%>">
                                    <%type.name%>
                                </option>
                            </select>
                            <label>AIMC Type:</label>
                            <select ng-model="fund.aimcfundtype">
                                <option ng-selected="1"
                                        ng-repeat="type in fundtype"
                                        value="<%type.value%>">
                                    <%type.name%>
                                </option>
                            </select>
                        </div>
                        <hr>
                        <button class="btn btn-primary" ng-click="next()">Next</button>
                    </div>
                    <div ng-hide="page!=2" class="panel-body">
                        <div>
                            <label>Name:</label>
                            <input ng-model="fund.name" type="text" class="form-control" />
                            <label> Strategy</label>
                            <textarea style="width: 100%" ng-model="fund.strategy"></textarea>
                            <hr>
                        </div>
                        <div class="form-inline">
                            <label>Asset Value:</label>
                            <input style="margin-right: 10px" ng-model="fund.asset" type="number" class="form-control" />

                            <label>Pay Policy</label>
                            <select>
                                <option>Have</option>
                                <option>Not Have</option>
                            </select>
                            <hr>
                            <label>Registered Date</label>
                            <input type="date" ng-model="fund.registered">

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
                        <hr>
                        <button class="btn btn-primary" ng-click="next()">Next</button>
                    </div>
                    <div ng-hide="page!=3" class="panel-body">
                        <div>
                            <label>Name:</label>
                            <input ng-model="fund.name" type="text" class="form-control" />
                            <label> Strategy</label>
                            <textarea style="width: 100%" ng-model="fund.strategy"></textarea>
                            <hr>
                        </div>
                        <div class="form-inline">
                            <label>Asset Value:</label>
                            <input style="margin-right: 10px" ng-model="fund.asset" type="number" class="form-control" />

                            <label>Pay Policy</label>
                            <select>
                                <option>Have</option>
                                <option>Not Have</option>
                            </select>
                            <hr>
                            <label>Registered Date</label>
                            <input type="date" ng-model="fund.registered">

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
                        <hr>
                        <button class="btn btn-primary" ng-click="next()">Next</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="/js/angular/fund/controller.js"></script>
@endsection