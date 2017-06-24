@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Result</div>

                <div class="panel-body">  
                    <div class="chart-area">  

                        <canvas id="result-chart" width="393" height="196"></canvas>

                    </div>
                    <hr />
                    <div>
                        <div class="form-group">                     
                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="price_per_unit">Fund Name</label> 
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <p><strong>{{$fund->aimc_type}}</strong>  {{$fund->name}}</p>
                            </div>   
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group">                     
                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="price_per_unit">Company Name</label> 
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <p>{{$fund->management_company}}</p>
                            </div>   
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group">                     
                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="price_per_unit">Fund Type</label> 
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <p>{{$fund->type}}</p>
                            </div>   
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group">                     
                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="price_per_unit">Balance of investment</label> 
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <p>{{$balance_of_investment}}</p>
                            </div>   
                        </div>
                        <div class="clearfix"></div>
                    </div> 
                    <div class="table-responsive">
                        <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">NAV Date</th>  
                                        <th class="text-center">Remaining Unit</th>      
                                        <th class="text-center">Investment Amount</th>      
                                        <th class="text-center">Return Investment Profit</th>       
                                        <th class="text-center">Return Investment Profit %</th>       
                                    </tr>
                                </thead>
                                <tbody> 
                                @foreach ($results as $item) 
                
                                    <tr>   
                                        <td class="text-center">
                                            {{$item['date']}} 
                                        </td>   
                                        <td class="text-center">{{round($item['remaining_unit'],2)}}</td>
                                        <td class="text-center">{{round($item['return_profit_total'],2)}}</td>
                                        <td class="text-center">{{round($item['return_profit'],2)}}</td>   
                                        <td class="text-center">{{round($item['return_profit_percent'],2)}} %</td>   
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>  
                    </div>
                    

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('style')
<style>
.chart-area{
    margin-top:20px;
    margin-bottom:50px;   
}
</style>
@endsection
@section('script')
<script src="/js/libs/Chart.min.js"></script>
<script>
$(document).ready(function(){

    var chartarea = $('#result-chart');  
    var dataset = [];
        dataset[0] = {
        labels: [
            @foreach ($results as $key => $item) 
                "{{$item['date']}}",
            @endforeach
        ],
            datasets: [
                {
                    label: "Investment Amount", 
                    borderColor: getRandomColor(), 
                    fill: false,
                    lineTension: 0.1,
                    pointRadius: 1,
                    data: [
                        @foreach ($results as $key => $item) 
                             "{{round($item['return_profit_total'],2)}}", 
                        @endforeach
                    ], 
                }
            ]
        };  
 
    if(dataset[0])
    {
        var myChart = new Chart(chartarea,{
            type: 'line',
            data: dataset[0],  
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