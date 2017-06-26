@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"> Member : Take Suitability Test</div> 
                
                <div class="panel-body"> 
                     <form class="form-horizontal" action="{{url('suitabilitytest/member/storetest')}}" method="POST" data-toggle="validator">
                        {{csrf_field()}}
                        <input type="hidden" name="test_id" value="{{$test->id}}">
                        <input type="hidden" name="test_member_id" value="{{Auth::user()->member->id}}">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="question_name">Question Name</label> 
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
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Update Date</label> 
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-control-static col-md-7 col-xs-12"> 
                                    {{$test->updated_at}}
                                </div> 
                            </div> 
                        </div> 
                        
                        @if(sizeof($test->suitability_test_questions) > 0)
                        {{--suit-question-group--}}
                        <div class="suit-question-group">

                            @foreach($test->suitability_test_questions as $qkey => $question)
                            <div class="results">
                                <hr>
                                <div class="form-group"> 
                                    <div class="text-center"> 
                                       <strong>Question {{$qkey+1}}</strong>
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

                                @if(sizeof($question->suitability_answers) > 0)
                               
                                    <div class="results"> 

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Answer</label> 
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    @foreach($question->suitability_answers as $akey => $answer)
                                                        <label class="radio-inline">
                                                            <input type="radio" name="q_{{$question->id}}" value="{{$answer->id}}" required>{{$answer->answer}}
                                                        </label> 
                                                     @endforeach
                                                    <div class="help-block with-errors"></div>
                                                </div>  
                                            </div>

                                        </div> 
                                @endif
                            @endforeach

                        </div> 
                        @endif 

                        </div>
                        {{--suit-question-group--}}
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"></label> 
                            <div class="col-md-6 col-sm-6 col-xs-12"> 
                                <button type="submit" class="btn btn-success pull-right">Submit</button>
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