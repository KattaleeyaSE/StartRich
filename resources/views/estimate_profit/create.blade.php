@extends('layouts.app')

@section('content')
<div class="container" ng-controller="estimateProfitController">
    <div class="row" ng-init="init()">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Member : Create Estimate Profit</div>

                <div class="panel-body"> 

                    <div class="alert alert-danger" ng-show="errorMsg">
                        <%errorMsg%>
                    </div>
                    <form method="post"  class="form-horizontal" name="createform">
                        
                        {!!csrf_field()!!}
                        <div class="form-group"> 
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
                        </div>  
 
                        <div class="form-group">                     
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
                    </div>
 
                        <div class="form-group">                     
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
                    </div>
 
                <div class="form-group">                     
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="buy_date">Buy Date</label> 
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input 
                            type="text" 
                            moment-picker="buyDate" 
                            format="YYYY-MM-DD" 
                            ng-model="buyDate" 
                            class="form-control" 
                            change="onBuyDateChange(newValue, oldValue)"
                            ng-required="true" 
                            disable="!selected.mutualFundType.id"
                        >
                    </div> 
                </div>
 
                <div class="form-group">                     
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price_per_unit">Nav offer</label> 
                    <div class="col-md-6 col-sm-6 col-xs-12"  ng-hide="!offAtBuyDate">
                        <p><%offAtBuyDate.offer%></p> 
                    </div> 
                    
                    <div class="has-error col-md-6 col-sm-6 col-xs-12" ng-hide="offAtBuyDate">
                        <span class="help-block">
                            <strong>No Value Found</strong>
                        </span>
                    </div>    

                </div>
 
                <div class="form-group">                     
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price_per_unit">Balance of investment</label> 
                    <div class="col-md-6 col-sm-6 col-xs-12">
                       <input 
                            type="number"  
                            ng-model="balance_of_investment" 
                            class="form-control"  
                            ng-required="true" 
                            min="1"
                        >
                    </div>  

                </div>


                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button 
                                    type="button" 
                                    class="btn btn-primary"
                                    ng-click="createform.$valid && create({{\Auth::user()->member->id}});"
                                >Submit</button>
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
        input.ng-invalid-min {
            border-color: red;
        }
    </style>
@endsection