@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Result</div>

                <div class="panel-body"> 

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