@extends('layouts.app')

@section('content')
<div class="container" ng-controller="suitabilityTestController">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">AMC : Create Suitability Test</div> 
                
                <div class="panel-body"> 
                    <div class="form-horizontal">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="question_name">Question Name</label> 
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="question_name" value="" class="form-control col-md-7 col-xs-12" /> 
                            </div> 
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description</label> 
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="description" class="form-control col-md-7 col-xs-12" /></textarea>
                            </div> 
                        </div>

                        <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Create Result</label> 
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <button type="button" class="btn btn-default" ng-click="addResultGroup();">Create</button>
                            </div> 
                        </div>

                        <div class="suit-result-group" ng-repeat="result in suitabilityTest.results">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Result <%$index+1%></label> 
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <button type="button" class="btn btn-default" ng-click="addResultGroup();">Create</button>
                                </div> 
                            </div>
                            
                        </div>


                    <div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="/js/angular/suitability_test/resource.js"></script> 
    <script src="/js/angular/suitability_test/controller.js"></script> 
@endsection