@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Result</div>

                <div class="panel-body"> 

                    <div class="chart-area">
                        <div class="form-group">
                        <label for="sel1">Select Fund:</label>
                        <select class="form-control" id="fund_selection">
                            @foreach ($result as $key => $item) 
                                <option value="{{$key}}">
                                    {{$item['estimate_item']->fund->name}}
                                </option> 
                            @endforeach
                        </select>
                        </div>

                        <canvas id="result-chart" width="393" height="196"></canvas>

                    </div>
                    <hr />
                    <div class="table-responsive">
                    <table class="table">
                            <thead>
                            <tr>  
                                <th class="text-center">Fund Name</th> 
                                <th class="text-center">Company Name</th>   
                                <th class="text-center">Fund Type</th> 
                                <th class="text-center">Recent Nav</th> 
                                <th class="text-center">Remaining Unit</th> 
                                <th class="text-center">Balance of Investment</th>       
                                <th class="text-center">Investment Amount</th>       
                                <th class="text-center">Total Dividend</th>       
                                <th class="text-center">Return Investment Profit</th>       
                                <th class="text-center">Return Investment Profit %</th>       
                            </tr>
                            </thead>
                            <tbody> 
                            @foreach ($result as $item) 
            
                                <tr>  
                                    <td class="text-center">
                                        <strong>{{$item['estimate_item']->fund->aimc_type}}</strong>
                                        <br>
                                        {{$item['estimate_item']->fund->name}}
                                    </td>  
                                    <td class="text-center">{{$item['estimate_item']->fund->management_company}}</td>   
                                    <td class="text-center">{{$item['estimate_item']->fund->type}}</td>   
                                    <td class="text-center">
                                        {{$item['recent_nav']->standard}}
                                        <br>
                                        {{$item['recent_nav']->modified_date}}
                                    </td>   
                                    <td class="text-center">{{$item['estimate_item']->balance_of_investment/$item['estimate_item']->nav->offer}}</td>   
                                    <td class="text-center">{{$item['estimate_item']->balance_of_investment}}</td>   
                                    <td class="text-center">{{round($item['return_profit_total'],2)}}</td>   
                                    <td class="text-center">{{round($item['total_dividend'],2)}}</td>   
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
    
    @foreach ($result as $key => $item)  

        dataset[{{$key}}] = {
        labels: [
            @foreach($item['estimate_item']->fund->past_performances as $past_perform)
                "{{$past_perform->date}}",
            @endforeach
        ],
            datasets: [
                {
                    label: "Information Ratio", 
                    borderColor: getRandomColor(), 
                    fill: false,
                    lineTension: 0.1,
                    pointRadius: 1,
                    data: [
                        @foreach($item['estimate_item']->fund->past_performances as $past_perform) 
                            @if($past_perform->records->where('name','=','Information Ratio')->first() != null)
                             "{{$past_perform->records->where('name','=','Information Ratio')->first()->since_inception}}",
                            @endif
                        @endforeach
                    ], 
                },
                {
                    label: "Standard Deviation", 
                    borderColor:getRandomColor(), 
                    fill: false,
                    lineTension: 0.1,
                    pointRadius: 1,
                    data: [
                        @foreach($item['estimate_item']->fund->past_performances as $past_perform) 
                            @if($past_perform->records->where('name','=','Standard Deviation')->first() != null)
                             "{{$past_perform->records->where('name','=','Standard Deviation')->first()->since_inception}}",
                            @endif
                        @endforeach
                    ], 
                }
            ]
        }; 
    @endforeach
 
    if(dataset[0])
    {
        var myChart = new Chart(chartarea,{
            type: 'line',
            data: dataset[0],  
        }); 
    }


    $('#fund_selection').change(function(){ 
        if(dataset[$(this).val()])
        {
            var myChart = new Chart(chartarea,{
                type: 'line',
                data: dataset[$(this).val()]
            }); 
        } 
    });
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