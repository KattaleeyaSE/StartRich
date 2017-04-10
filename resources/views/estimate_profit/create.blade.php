@extends('layouts.app')

@section('content')
<div class="container" ng-controller="estimateProfitController">
    <div class="row" ng-init="init()">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Member : Create Estimate Profit</div>

                <div class="panel-body"> 
                    <form action="{{url('estimateprofit/store')}}" method="post"  class="form-horizontal">
                        
                        {!!csrf_field()!!}
                        <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">
                            
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="company_name">Company name</label> 
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <ui-select ng-model="selected.company" theme="bootstrap" on-select="onSelectedCompany()">
                                    <ui-select-match>
                                            <div ng-bind-html="bindHtml(selected.company.company_name)"></div>
                                    </ui-select-match>
                                    <ui-select-choices repeat="fund in (funds  | unique:'company_name'| filter: $select.search) track by fund.id"> 
                                            <div ng-bind-html="fund.company_name | highlight: $select.search"></div>
                                    </ui-select-choices>
                                </ui-select>
                            </div>
                            @if ($errors->has('company_name'))
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="help-block text-center">
                                            <strong>{{ $errors->first('company_name') }}</strong>
                                        </span>
                                    </div> 
                                </div> 
                            @endif
                        </div>  
 
                        <div class="form-group{{ $errors->has('mutual_fund_type') ? ' has-error' : '' }}">                     
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mutual_fund_type">Type of mutual fund</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <ui-select ng-model="selected.mutualFundType" theme="bootstrap"  on-select="onSelectedMutualFundType()">
                                <ui-select-match>
                                        <div ng-bind-html="bindHtml(getNormalFund(selected.mutualFundType.type).name)"></div>
                                </ui-select-match>
                                <ui-select-choices ui-disable-choice="!selected.company" repeat="fund in (funds | filter: {company_name : selected.company.company_name }:true )| unique:'type' track by fund.id"> 
                                        <div ng-hide="!selected.company" ng-bind-html="getNormalFund(fund.type).name | highlight: $select.search"></div>
                                </ui-select-choices>
                            </ui-select>
                        </div>
                        @if ($errors->has('mutual_fund_type'))
                            <div class="row">
                                <div class="col-md-12">
                                    <span class="help-block text-center">
                                        <strong>{{ $errors->first('mutual_fund_type') }}</strong>
                                    </span>
                                </div> 
                            </div> 
                        @endif
                    </div>
 
                        <div class="form-group{{ $errors->has('mutual_fund') ? ' has-error' : '' }}">                     
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mutual_fund">Mutual fund</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <ui-select ng-model="selected.mutualFund" theme="bootstrap">
                                <ui-select-match>
                                        <div ng-bind-html="bindHtml(selected.mutualFund.name)"></div>
                                </ui-select-match>
                                <ui-select-choices ui-disable-choice="!selected.mutualFundType" repeat="fund in (funds | filter: {company_name : selected.mutualFundType.company_name, type : selected.mutualFundType.type  }:true )  track by fund.id"> 
                                        <div ng-hide="!selected.mutualFundType" ng-bind-html="fund.name | highlight: $select.search"></div>
                                </ui-select-choices>
                            </ui-select>
                        </div>
                        @if ($errors->has('mutual_fund'))
                            <div class="row">
                                <div class="col-md-12">
                                    <span class="help-block text-center">
                                        <strong>{{ $errors->first('mutual_fund') }}</strong>
                                    </span>
                                </div> 
                            </div> 
                        @endif
                    </div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </from> 
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="/js/angular/estimate_profit/resource.js"></script> 
    <script src="/js/angular/estimate_profit/controller.js"></script> 
@endsection
@section('style')
    <style>
        input.ng-invalid-required {
            border-color: red;
        }
    </style>
@endsection