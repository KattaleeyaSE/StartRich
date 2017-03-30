@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Member : View Suitability Test</div> 
                
                <div class="panel-body"> 
                    <form class="form-horizontal" action="{{url('/suitabilitytest/member/recordtest')}}" method="GET">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="question_name">Name</label> 
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-control-static col-md-7 col-xs-12"> 
                                    {{$test_result->suitability_test->name}}
                                </div> 
                            </div> 
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description</label> 
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-control-static col-md-7 col-xs-12"> 
                                    {{$test_result->suitability_test->description}}
                                </div> 
                            </div> 
                        </div>
 
                        <hr>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Firstname</label> 
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-control-static col-md-7 col-xs-12">
                                    {{\Auth::user()->member->firstname}}
                                </div> 
                            </div> 
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Lastname</label> 
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-control-static col-md-7 col-xs-12">
                                    {{\Auth::user()->member->lastname}}
                                </div> 
                            </div> 
                        </div>

                        <hr>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Score</label> 
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-control-static col-md-7 col-xs-12">
                                     {{$test_result->score}}
                                </div> 
                            </div> 
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Risk Level</label> 
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-control-static col-md-7 col-xs-12">
                                    {{$test_result->risk_level}}
                                </div> 
                            </div> 
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Type of Investor</label> 
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-control-static col-md-7 col-xs-12">
                                    {{$test_result->type_of_investors}}
                                </div> 
                            </div> 
                        </div>

                        @if(sizeof($test_result->suitability_asset_test) > 0)

                            @foreach($test_result->suitability_asset_test as $key => $asset) 
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">{{$asset->name}} Allocation</label> 
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-control-static col-md-7 col-xs-12"> 
                                            {{$asset->pivot->percent}}
                                        </div> 
                                    </div> 
                                </div> 
                            @endforeach
                            
                        @endif
                        
                        {{--Appropriate mutual fund--}}
                         <hr>                              
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Appropriate mutual fund</label> 
                            <div class="col-md-6 col-sm-6 col-xs-12"> 
                                
                            </div> 
                        </div>
                        {{--!Appropriate mutual fund--}}

                        {{--Appropriate asset--}}
                         <hr>                              
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Appropriate asset</label> 
                            <div class="col-md-6 col-sm-6 col-xs-12"> 
                                
                            </div> 
                        </div>
                        {{--!Appropriate asset--}}
 
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"></label> 
                            <div class="col-md-6 col-sm-6 col-xs-12"> 
                                <button type="submit" class="btn btn-success pull-right">Record</button>
                            </div> 
                        </div> 

                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection