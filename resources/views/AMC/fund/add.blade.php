@extends('layouts.app')

@section('content')
    <script>
        angular.module("app").constant("CSRF_TOKEN", '{{ csrf_token() }}');
    </script>
    <div class="container" ng-controller="fundController" >
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">AMC : Create Fund</div>

                    <div  class="panel-body">
                        <div ng-show="page==1" ng-init="page=1">
                            <div >
                                <label>Name:</label>
                                <input ng-model="fund.name" type="text" class="form-control" />
                                <label>Company Name:</label>
                                <input ng-model="fund.company_name" type="text" class="form-control" />
                                <label>Detail:</label>
                                <textarea style="width: 100%" ng-model="fund.desc"></textarea>

                                <label>Trustee:</label>
                                <input ng-model="fund.truestee" type="text" class="form-control" />
                                <label>Frequency:</label>
                                <input ng-model="fund.frequency" type="text" class="form-control" />
                                <label> Strategy</label>
                                <textarea style="width: 100%" ng-model="fund.strategy"></textarea>
                                <hr>
                                <label> Invesment Policy</label>
                                <textarea style="width: 100%" ng-model="fund.investmentpolicy"></textarea>
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

                        </div>
                        <div ng-show="page==2">

                            <div class="form-inline">
                                <label>Frontend fee:</label>
                                <input style="margin-right: 10px" ng-model="fund.frontendfee" type="number" class="form-control" />
                                <label>Actual Frontend fee</label>
                                <input type="number" ng-model="fund.actualfrontendfee">

                            </div>
                            <hr>
                            <div class="form-inline">
                                <label>Backend fee:</label>
                                <input style="margin-right: 10px" ng-model="fund.backendfee" type="number" class="form-control" />
                                <label>Actual Backend fee</label>
                                <input type="number" ng-model="fund.actualbackendfee">

                            </div>
                            <hr>
                            <div class="form-inline">
                                <label>swtich fee:</label>
                                <input style="margin-right: 10px" ng-model="fund.swtichfee" type="number" class="form-control" />
                                <label>total expense</label>
                                <input type="number" ng-model="fund.totalexpense">

                            </div>
                            <hr>
                            <div class="form-inline">
                                <label>manage fee:</label>
                                <input style="margin-right: 10px" ng-model="fund.managefee" type="number" class="form-control" />
                                <label>actual manage fee</label>
                                <input type="number" ng-model="fund.actualmanagefee">

                            </div>
                            <hr>
                            <div class="form-inline">
                                <label>trusteefee:</label>
                                <input style="margin-right: 10px" ng-model="fund.trusteefee" type="number" class="form-control" />
                                <label>actual trusteefee</label>
                                <input type="number" ng-model="fund.actualtrusteefee">

                            </div>
                            <hr>
                            <div class="form-inline">
                                <label>registrafee:</label>
                                <input style="margin-right: 10px" ng-model="fund.registrafee" type="number" class="form-control" />
                                <label>actual registrafee</label>
                                <input type="number" ng-model="fund.actualregistrafee">

                            </div>
                            <hr>
                            <div class="form-inline">
                                <label>initial:</label>
                                <input style="margin-right: 10px" ng-model="fund.initial" type="number" class="form-control" />
                                <label>addition</label>
                                <input type="number" ng-model="fund.addition">

                            </div>
                            <hr>
                            <div class="form-inline">
                                <label>other:</label>
                                <input style="margin-right: 10px" ng-model="fund.initial" type="text" class="form-control" />


                            </div>
                            <hr>

                        </div>

                        <button ng-show="(page>1)" class="btn btn-primary" ng-click="back()">Back</button>
                        <button  class="btn btn-primary" ng-click="next()">Next</button>

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