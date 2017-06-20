@extends('layouts.app')

@section('content')
<div class="container" ng-controller="simulatorController">
    <div class="row" ng-init="init()">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Member : Create Simulator</div>

            <div class="panel-body"> 
                @if(isset($isFail) && $isFail == true)
                    <div class="alert alert-danger text-center">
                         <b>Cannot simulate with this Mutual Fund.</b>
                         <br/>
                         <b>Please try another Mutual Fund!</b>    
                    </div>
                @endif
                <form   
                    method="post" 
                    action="{{url('simulator/create')}}"  
                    class="form-horizontal" 
                    id="createSimulatorForm" 
                    name="createform"> 
                        {!!csrf_field()!!}
                    <div class="form-group"> 
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="company_name">Company name</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <ui-select ng-model="selected.company" theme="bootstrap" on-select="onSelectedCompany()">
                                <ui-select-match>
                                        <div ng-bind-html="bindHtml(selected.company.management_company)"></div>
                                </ui-select-match>
                                <ui-select-choices repeat="fund in (funds  | unique:'management_company'| filter: $select.search) track by fund.id"> 
                                        <div ng-bind-html="fund.management_company | highlight: $select.search"></div>
                                </ui-select-choices>
                            </ui-select>
                        </div> 
                    </div>  
 
                <div class="form-group">                     
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mutual_fund_type">Type of mutual fund</label> 
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <ui-select ng-model="selected.mutualFundType" theme="bootstrap"  on-select="onSelectedMutualFundType()">
                            <ui-select-match>
                                    <div ng-bind-html="bindHtml(selected.mutualFundType.type)"></div>
                            </ui-select-match>
                            <ui-select-choices ui-disable-choice="!selected.company" repeat="fund in (funds | filter: {management_company : selected.company.management_company }:true )| unique:'type' track by fund.id"> 
                                    <div ng-hide="!selected.company" ng-bind-html="fund.type | highlight: $select.search"></div>
                            </ui-select-choices>
                        </ui-select>
                    </div> 
                </div>
 
                <div class="form-group">                     
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mutual_fund">Mutual fund</label> 
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <ui-select ng-model="selected.mutualFund" theme="bootstrap" on-select="onSelectedFund()">
                            <ui-select-match>
                                    <div ng-bind-html="bindHtml(selected.mutualFund.name)"></div>
                            </ui-select-match>
                            <ui-select-choices ui-disable-choice="!selected.mutualFundType" repeat="fund in (funds | filter: {management_company : selected.mutualFundType.management_company, type : selected.mutualFundType.type  }:true )  track by fund.id"> 
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
                            name="buy_date"  
                            moment-picker="buyDate" 
                            format="YYYY-MM-DD" 
                            ng-model="buyDate" 
                            class="form-control" 
                            change="onBuyDatePickerChange(newValue, oldValue)"
                            ng-required="true" 
                            min-date="dateRange.buy_start"
                            max-date="dateRange.buy_end"
                            start-view="month"
                            disable="!selected.mutualFundType.id"
                        >
                    </div> 
                </div> 

                <div class="form-group">                     
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="buy_date">Sell Date</label> 
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input 
                            type="text"
                            name="sell_date"  
                            moment-picker="sellDate" 
                            format="YYYY-MM-DD" 
                            ng-model="sellDate" 
                            class="form-control" 
                            change="onSellDatePickerChange(newValue, oldValue)"
                            min-date="dateRange.sell_start"
                            max-date="dateRange.sell_end"
                            start-view="month"
                            ng-required="true" 
                            disable="!buyDate"
                        >
                    </div> 
                </div> 

                <div class="form-group">                     
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price_per_unit">Balance of investment</label> 
                    <div class="col-md-6 col-sm-6 col-xs-12">
                       <input 
                            type="number" 
                            name="balance_of_investment" 
                            ng-model="balance_of_investment" 
                            class="form-control"  
                            ng-required="true" 
                            min="<%selected.mutualFundType.purchasedetails[0].min_first_purchase > 0 ? selected.mutualFundType.purchasedetails[0].min_first_purchase : 1%>"
                        >
                    </div>   
                </div>

                <div class="sr-only">
                    <input type="text" name="fund_id" value="<%selected.mutualFund.id%>">
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button 
                            type="button" 
                            class="btn btn-primary"
                            ng-click="createform.$valid && create();"
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
    <script src="/js/angular/simulator/controller.js"></script> 
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