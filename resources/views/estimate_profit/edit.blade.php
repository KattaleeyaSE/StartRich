@extends('layouts.app')

@section('content')
<div class="container" ng-controller="estimateProfitController">
    <div class="row" ng-init="initUpdate({{$estimate_profit->fund->id}},'{{$estimate_profit->effective_date}}',{{$estimate_profit->balance_of_investment}})">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Member : Create Estimate Profit</div>

                <div class="panel-body"> 
 
                    <form method="post"  class="form-horizontal" name="editform" data-toggle="validator">
                        
                        {!!csrf_field()!!}
                        <div class="form-group"> 
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="company_name">Company name</label> 
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{$estimate_profit->fund->management_company}}
                            </div> 
                        </div>  
 
                        <div class="form-group">                     
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mutual_fund_type">Type of mutual fund</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                                  {{$estimate_profit->fund->type}}
                        </div> 
                    </div>
 
                        <div class="form-group">                     
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mutual_fund">Mutual fund</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                                     {{$estimate_profit->fund->name}}
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
                            disable="!selected.mutualFund"
                        >
                        <div role="alert">
                          <span class="error" ng-show="editform.buy_date.$error.required">This field is required.</span>
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
                          <span class="error" ng-show="editform.balance.$error.required">This field is required.</span>
                          <span class="error" ng-show="editform.balance.$error.min">The minimum is <%selected.mutualFundType.purchasedetails[0].min_first_purchase > 0 ? selected.mutualFundType.purchasedetails[0].min_first_purchase : 1%></span>
                          <span class="error" ng-show="editform.balance.$error.pattern">The balance of investment format allow only 0-9.</span>
                        </div>
                    </div>  

                </div>


                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button 
                                    type="button" 
                                    class="btn btn-primary"
                                    ng-click="editform.$valid && update({{$estimate_profit->id}});"
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