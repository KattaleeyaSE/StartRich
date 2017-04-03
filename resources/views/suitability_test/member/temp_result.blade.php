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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mutual fund</label> 
                            <div class="col-md-6 col-sm-6 col-xs-12"> 
                                
                            </div> 
                        </div>
                        {{--!Appropriate mutual fund--}}

                        @if(sizeof($test_result->suitability_test->suitability_test_results) > 0)
                        {{--Appropriate asset--}}
                         <hr>                              
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Appropriate asset allocation</label> 
                            <div class="col-md-6 col-sm-6 col-xs-12"> 
                                
                            </div> 
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr> 
                                        <th rowspan="2" class="text-center">Type of Investor</th>
                                        <th colspan="3" class="text-center">Asset Allocation</th>
                                    </tr>
                                    <tr>
                                        @foreach($test_result->suitability_test->suitability_test_assets as $asset)
                                            <th class="text-center">{{$asset->name}}</th> 
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($test_result->suitability_test->suitability_test_results as $result)
                                    <tr>
                                        <td>{{$result->type_of_investors}}</td>
                                        @foreach($result->suitability_asset_test as $asset_test)
                                            <td>{{$asset_test->pivot->percent}}</td>
                                        @endforeach
                                    </tr> 
                                  @endforeach
                                </tbody>
                            </table>

                        </div>
                        {{--!Appropriate asset--}}
                        @endif

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