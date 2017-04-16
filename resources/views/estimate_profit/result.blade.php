@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Result</div>

                <div class="panel-body"> 

                    <div class="table-responsive">
                    <table class="table">
                            <thead>
                            <tr> 
                                <th class="text-center">Buy Date</th> 
                                <th class="text-center">Fund Name</th> 
                                <th class="text-center">Company Name</th>  
                                <th class="text-center">Balance of Investment</th>   
                            </tr>
                            </thead>
                            <tbody> 
                            @foreach ($result as $item) 
            
                                <tr> 
                                    <td class="text-center">{{$item['estimate_item']->effective_date}}</td>  
                                    <td class="text-center">
                                        <strong>{{$item['estimate_item']->fund->aimc_type}}</strong>
                                        <br>
                                        {{$item['estimate_item']->fund->name}}
                                    </td>  
                                    <td class="text-center">{{$item['estimate_item']->fund->management_company}}</td>   
                                    <td class="text-center">{{$item['estimate_item']->balance_of_investment}}</td>   
  
 
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