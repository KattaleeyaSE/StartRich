@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Member : View Suitability Test</div> 
                
                <div class="panel-body"> 
                    <div class="form-horizontal">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="question_name">Name</label> 
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-control-static col-md-7 col-xs-12"> 
                                    {{$suitabilityTests->suitability_test->name}}
                                </div> 
                            </div> 
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description</label> 
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-control-static col-md-7 col-xs-12"> 
                                    {{$suitabilityTests->suitability_test->description}}
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
                                     {{$suitabilityTests->score}}
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
                                <div class="form-group result-asset">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">{{$asset->name}} Allocation</label> 
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-control-static col-md-7 col-xs-12"> 
                                            {{$asset->pivot->percent}}
                                        </div> 
                                    </div>
                                    <div data-asset-name="{{$asset->name}}"></div> 
                                    <div data-asset-percent="{{$asset->pivot->percent}}"></div> 
                                </div> 
                            @endforeach
                            
                            <div id="chart-area">
                                <canvas id="result-chart" width="393" height="196"></canvas>
                            </div>
                        @endif


                       @if(sizeof($test_result->suitability_test->suitability_test_results) > 0)
                        {{--Appropriate mutual fund--}}
                         <hr>                              
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mutual fund</label> 
                            <div class="col-md-6 col-sm-6 col-xs-12"> 
                                
                            </div> 
                        </div>

                        
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr> 
                                        <th class="text-center">Type of Investor</th>
                                        <th class="text-center">Risk Level</th>
                                        <th class="text-center">Fund</th>
                                        <th class="text-center">Description</th>
                                    </tr> 
                                </thead>
                                <tbody>
                                  @foreach($test_result->suitability_test->suitability_test_results as $result)
                                    
                                    <tr>
                                        <td {{sizeof($result->suitability_fund) > 1 ? 'rowspan='.sizeof($result->suitability_fund):''}}>
                                            {{$result->type_of_investors}}
                                        </td> 

                                    @if(sizeof($result->suitability_fund ) == 1)
                                        <td>{{$result->suitability_fund[0]->risk_level}}</td> 
                                        <td><a href="">{{$result->suitability_fund[0]->name}}</a></td> 
                                        <td>{{$result->suitability_fund[0]->investment_asset_detail}}</td>   
                                    </tr> 
                                    @elseif(sizeof($result->suitability_fund ) > 1) 

                                        @foreach($result->suitability_fund as $key => $fund) 
                                         @if($key == 0)
                                                <td>{{$fund->risk_level}}</td> 
                                                <td><a href="">{{$fund->name}}</a></td> 
                                                <td>{{$fund->investment_asset_detail}}</td>   
                                            </tr> 
                                         @else 
                                            <tr> 

                                                    <td>{{$fund->risk_level}}</td> 
                                                    <td><a href="">{{$fund->name}}</a></td> 
                                                    <td>{{$fund->investment_asset_detail}}</td>   
                                                
                                            </tr>  
                                         @endif 
                                        @endforeach

                                    @else
                                        <td></td> 
                                        <td></td> 
                                        <td></td>   
                                    </tr>  
                                    @endif

                                  @endforeach
                                </tbody>
                            </table>

                        </div>
                        @endif
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
  
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
<script src="/js/libs/Chart.min.js"></script>
<script>
$(document).ready(function(){

    var asset_chart = $('#result-chart');
    var assets_name = $('.result-asset').find('div[data-asset-name]');
    var assets_value = $('.result-asset').find('div[data-asset-percent]');
    
    var assets_name_arrays = [];
    var assets_value_arrays = [];
    var assets_color_arrays = [];
    if(asset_chart && assets_name && assets_value)
    {
        $(assets_name).each(function(){
            assets_name_arrays.push($(this).attr('data-asset-name'));
            assets_color_arrays.push(getRandomColor());
        });
        $(assets_value).each(function(){
            assets_value_arrays.push($(this).attr('data-asset-percent'));
        });

        var data = {
                    labels: assets_name_arrays,
                    datasets: [
                        {
                            data: assets_value_arrays,
                            backgroundColor: assets_color_arrays,
                            hoverBackgroundColor: assets_color_arrays
                        }]
                    }; 
 
        var myPieChart = new Chart(asset_chart,{
            type: 'pie',
            data: data,  
        });
    }
});

function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}
</script>
@endsection