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
                    <form method="post"  class="form-horizontal" name="createform" data-toggle="validator">
                        
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
                            <ui-select ng-model="selected.mutualFund" theme="bootstrap">
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
                            change="onBuyDateChange(newValue, oldValue)"
                            ng-required="true" 
                            disable="!selected.mutualFundType.id"
                        >
                        <div role="alert">
                          <span class="error" ng-show="createform.buy_date.$error.required">This field is required.</span>
                          <span class="error" ng-show="createform.buy_date.$error.pattern">Wrong format</span>
                        </div>
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
                            type="text"  
                            name="balance"
                            ng-model="balance_of_investment" 
                            class="form-control"  
                            ng-required="true" 
                            ng-pattern="/^[0-9]*$/"
                            maxlength="10"
                            min="<%selected.mutualFundType.purchasedetails[0].min_first_purchase > 0 ? selected.mutualFundType.purchasedetails[0].min_first_purchase : 1%>"
                        >
                        <div role="alert">
                          <span class="error" ng-show="createform.balance.$error.required">This field is required.</span>
                          <span class="error" ng-show="createform.balance.$error.min">The minimum is <%selected.mutualFundType.purchasedetails[0].min_first_purchase > 0 ? selected.mutualFundType.purchasedetails[0].min_first_purchase : 1%></span>
                          <span class="error" ng-show="createform.balance.$error.pattern">The balance of investment format allow only 0-9.</span>
                        </div>
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
@endsection
@section('style')
    <style>
        input.ng-invalid, input.ng-invalid:focus {
            border-color: #a94442;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        }

        .error {
            color: #a94442;
        }
    </style>
@endsection