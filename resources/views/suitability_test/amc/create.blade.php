@extends('layouts.app')

@section('content')
<div class="container" ng-controller="suitabilityTestController" ng-cloak>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">AMC : Create Suitability Test</div> 
                
                <div class="panel-body"> 
                    <form class="form-horizontal" name="createform">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="question_name">Question Name</label> 
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="question_name" ng-model="suitabilityTest.question_name" class="form-control col-md-7 col-xs-12" ng-required="true" /> 
                            </div> 
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description</label> 
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="description" class="form-control col-md-7 col-xs-12" ng-model="suitabilityTest.description"/></textarea>
                            </div> 
                        </div>


                        {{--suit-result-group--}}
                        <div class="suit-result-group" ng-show="suitabilityTest.show_create_result">

                            {{--Asset--}}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Create Asset Allocation</label> 
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <button type="button" class="btn btn-default" ng-click="addAssetGroup();">Create</button>
                                </div> 
                            </div> 
                            <div ng-repeat="asset in suitabilityTest.assets">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset <%$index+1%></label> 
                                    <div class="col-md-6 col-sm-6 col-xs-12"> 
                                        <button type="button" class="btn btn-danger pull-right" ng-click="removeAssetGroup($index,asset.id);">Remove</button>
                                    </div> 
                                </div>  
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset</label> 
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="assets[]" ng-model="asset.name" class="form-control col-md-7 col-xs-12"  ng-required="true" /> 
                                    </div> 
                                </div>
                            </div> 
                            {{--Asset--}}


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Create Result</label> 
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <button type="button" class="btn btn-default" ng-click="addResultGroup();">Create</button>
                                </div> 
                            </div>

                            <div class="results" ng-repeat="result in suitabilityTest.results">
                                  <hr>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Result <%$index+1%></label> 
                                    <div class="col-md-6 col-sm-6 col-xs-12"> 
                                        <button type="button" class="btn btn-danger pull-right" ng-click="removeResultGroup($index,result.id);">Remove</button>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Max Score</label> 
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" name="max_score[]" ng-model="result.max_score" class="form-control col-md-7 col-xs-12" /> 
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Min Score</label> 
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" name="min_score[]" ng-model="result.min_score" class="form-control col-md-7 col-xs-12" /> 
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Risk Level</label> 
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="risk_level[]" ng-model="result.risk_level" class="form-control col-md-7 col-xs-12" /> 
                                    </div> 
                                </div>
                                                        
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Type of Investor</label> 
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea name="type_of_investors[]" class="form-control col-md-7 col-xs-12" ng-model="result.type_of_investors"/></textarea>
                                    </div> 
                                </div>

                                <div ng-repeat="asset in suitabilityTest.assets">
                                    <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><%asset.name%> Allocation</label> 
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="risk_level[]" ng-model="result.asset[$index].allocate" class="form-control col-md-7 col-xs-12"  ng-required="true" /> 
                                    </div> 
                                </div>
                                </div>

                            </div> 
                        </div>
                        {{--suit-result-group--}}
                        
                        {{--suit-question-group--}}
                        <div class="suit-question-group" ng-show="suitabilityTest.show_add_question">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Create Question</label> 
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <button type="button" class="btn btn-default" ng-click="addQuestionGroup();">Create</button>
                                </div> 
                            </div>

                            <div class="results" ng-repeat="question in suitabilityTest.questions">
                                <hr>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Question <%$index+1%></label> 
                                    <div class="col-md-6 col-sm-6 col-xs-12"> 
                                        <button type="button" class="btn btn-danger pull-right" ng-click="removeQuestionGroup($index,question.id);">Remove</button>
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Question</label> 
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="questions[]" ng-model="question.question" class="form-control col-md-7 col-xs-12" ng-required="true" /> 
                                    </div> 
                                </div>
                             <hr>  
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Create Answer</label> 
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <button type="button" class="btn btn-default" ng-click="addAnswerGroup(question);">Create</button>
                                </div> 
                            </div>

                            <div class="results" ng-repeat="answer in question.answers">
                                <hr>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Answer <%$index+1%></label> 
                                    <div class="col-md-6 col-sm-6 col-xs-12"> 
                                        <button type="button" class="btn btn-danger pull-right" ng-click="removeAnswerGroup(question,$index,answer.id);">Remove</button>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Answer Score</label> 
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" name="answer_score[]" ng-model="answer.score" class="form-control col-md-7 col-xs-12" /> 
                                    </div> 
                                </div> 

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Answer</label> 
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="answer[]" ng-model="answer.answer" class="form-control col-md-7 col-xs-12" ng-required="true" /> 
                                    </div> 
                                </div> 
                                
                            </div> 

                                
                            </div> 
                        </div>
                        {{--suit-question-group--}}
                        <hr>
                        <div class="form-group" ng-show="suitabilityTest.show_create_result">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"></label> 
                            <div class="col-md-6 col-sm-6 col-xs-12"> 
                                <button type="button" class="btn btn-default pull-right" ng-click="createform.$valid && showAddQuestionSection();">Next</button>
                            </div> 
                        </div> 

                        <div class="form-group" ng-show="suitabilityTest.show_add_question">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"></label> 
                            <div class="col-md-6 col-sm-6 col-xs-12"> 
                                <button type="button" class="btn btn-default" ng-click="showAddResultSection();">Back</button>
                                <button type="button" class="btn btn-success pull-right" ng-click="createform.$valid && create({{\Auth::user()->amc->id}});">Submit</button>
                            </div> 
                        </div> 

                    </form>
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
@section('style')
    <style>
        input.ng-invalid-required {
            border-color: red;
        }
    </style>
@endsection