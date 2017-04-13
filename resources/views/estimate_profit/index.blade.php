@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Member : Estimate Profit</div> 
                <div class="panel-body">
                    <a href="{{url('estimateprofit/create')}}" class="btn btn-success">Create</a>
                </div>
                <div class="panel-body">  
                <div class="table-responsive">
                    <table class="table">
                            <thead>
                            <tr> 
                                <th class="text-center">Buy Date</th> 
                                <th class="text-center">Fund Name</th> 
                                <th class="text-center">Company Name</th>  
                                <th class="text-center">Balance of Investment</th>  
                                <th class="text-center">NAV Offer</th>  
                                <th class="text-center">Unit</th>  
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($estimate_profits as $item)
                                <tr> 
                                    <td class="text-center">{{$item->effective_date}}</td>  
                                    <td class="text-center">
                                        <strong>{{TypeConverter::mapAIMCType($item->fund->aimcfundtype)}}</strong>
                                        <br>
                                        {{$item->fund->name}}
                                    </td>  
                                    <td class="text-center">{{$item->fund->company_name}}</td>   
                                    <td class="text-center">{{$item->balance_of_investment}}</td>   
                                    <td class="text-center">{{$item->nav->offer}}</td>   
                                    <td class="text-center">{{$item->balance_of_investment/$item->nav->offer}}</td>   
                                    <td class="text-center">Added</td> 
                                    <td class="text-center">
                                        <a href="{{url('/estimateprofit/edit/'.$item->id)}}" class="btn btn-warning">Edit</a> | <a href="{{url('/estimateprofit/delete/'.$item->id)}}" data-button-type="delete" class="btn btn-danger">Delete</a>
                                    </td> 
                                </tr> 
                            @endforeach
                            </tbody>
                        </table>  
                    </div>
                    {{-- Paging --}}
                      <div class="text-center">
                          <a href="{{url('/estimateprofit/result')}}" class="btn btn-default">Calculate & Result</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

{{--Delete Form--}}
<form action="" method="post" id="deleteform">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
</form>
@endsection
@section('script')
<script>
   $("[data-button-type=delete]").click(function(e) {
          e.preventDefault();
          var delete_button = $(this);
          var delete_url = $(this).attr('href');

          if (confirm("{{ trans('backpack::crud.delete_confirm') }}") == true) {
                $('#deleteform').attr('action',delete_url);
                $('#deleteform').submit();
            }
      }); 
</script>      
@endsection