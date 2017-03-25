@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">AMC : View Suitability Test</div> 
                
                <div class="panel-body"> 
                    <div class="form-horizontal">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="question_name">Name</label> 
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-control-static col-md-7 col-xs-12"> 
                                    {{$test->name}}
                                </div> 
                            </div> 
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description</label> 
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-control-static col-md-7 col-xs-12"> 
                                    {{$test->description}}
                                </div> 
                            </div> 
                        </div>

                        @if(sizeof($test->suitability_test_results) > 0)
                        {{--suit-result-group--}}
                        <div class="suit-result-group">
 
                            @foreach($test->suitability_test_results as $key => $result)
                            <div class="results">
                                  <hr>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Result {{$key +1 }}</label> 
                                    <div class="col-md-6 col-sm-6 col-xs-12"> 
                                       
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Max Score</label> 
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-control-static col-md-7 col-xs-12"> 
                                            {{$result->max_score}}
                                        </div> 
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Min Score</label> 
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                         <div class="form-control-static col-md-7 col-xs-12"> 
                                            {{$result->min_score}}
                                        </div> 
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Risk Level</label> 
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                         <div class="form-control-static col-md-7 col-xs-12"> 
                                            {{$result->risk_level}}
                                        </div> 
                                    </div> 
                                </div>
                                                        
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Type of Investor</label> 
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-control-static col-md-7 col-xs-12"> 
                                            {{$result->type_of_investors}}
                                        </div> 
                                    </div> 
                                </div>

                            </div>
                            @endforeach
                            
                        </div>
                        {{--suit-result-group--}}
                        @endif



                        @if(sizeof($test->suitability_test_questions) > 0)
                        {{--suit-question-group--}}
                        <div class="suit-question-group">

                            @foreach($test->suitability_test_questions as $qkey => $question)
                            <div class="results">
                                <hr>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Question {{$qkey+1}}</label> 
                                    <div class="col-md-6 col-sm-6 col-xs-12"> 
                                       
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Question</label> 
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-control-static col-md-7 col-xs-12"> 
                                            {{$question->question}}
                                        </div> 
                                    </div> 
                                </div>
                             <hr>  


                                @if(sizeof($question->suitability_answers) > 0)
                                  @foreach($question->suitability_answers as $akey => $answer)
                                    <div class="results">
                                        <hr>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Answer {{$akey+1}}</label> 
                                            <div class="col-md-6 col-sm-6 col-xs-12"> 
                                                
                                            </div> 
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Answer Score</label> 
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-control-static col-md-7 col-xs-12"> 
                                                    {{$answer->score}}
                                                </div> 
                                            </div> 
                                        </div> 

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Answer</label> 
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-control-static col-md-7 col-xs-12"> 
                                                        {{$answer->answer}}
                                                    </div> 
                                                </div>  
                                            </div> 
                                        </div> 
                                    @endforeach
                                @endif
                            @endforeach

                        </div> 
                        @endif 

                        </div>
                        {{--suit-question-group--}}
                         
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection