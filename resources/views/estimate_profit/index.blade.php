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
                                    <td class="text-center">Added</td> 
                                    <td class="text-center">
                                        <a href="{{url('/suitabilitytest/amc/show/'.$item->id)}}" class="btn btn-primary">View</a> | <a href="{{url('/suitabilitytest/amc/edit/'.$item->id)}}" class="btn btn-warning">Edit</a> | <a href="{{url('/suitabilitytest/amc/delete/'.$item->id)}}" data-button-type="delete" class="btn btn-danger">Delete</a>
                                    </td> 
                                </tr> 
                            @endforeach
                            </tbody>
                        </table>  
                    </div>
                    {{-- Paging --}}
                      <div class="text-center">
              
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

   function getAIMCTypeName(id)
   {
       var fundtype=[
          {
              name:'EQSM',
              value:'1',

          },{
              name:'EQLARGE',
              value:'2',

          },{
              name:'EQGEN',
              value:'3',

          },{
              name:'EQUS',
              value:'4',

          },{
              name:'EQJP',
              value:'5',
              detail:''
          },{
              name:'EQEU',
              value:'6',
              detail:''
          },{
              name:'EQCH',
              value:'7',
              detail:''
          },{
              name:'EQGL',
              value:'8',
              detail:''
          },{
              name:'EQGEM',
              value:'9',
              detail:''
          },{
              name:'EQASxJP',
              value:'10',
              detail:''
          },{
              name:'EQIN',
              value:'11',
              detail:''
          },{
              name:'EQASEAN',
              value:'12',
              detail:''
          },{
              name:'EQHEALTH',
              value:'13',
              detail:''
          },{
              name:'EQENERGY',
              value:'14',
              detail:''
          },{
              name:'EQSET50',
              value:'15',
              detail:''
          },{
              name:'FIXGOV',
              value:'16',
              detail:''
          },{
              name:'FIXGEN',
              value:'17',
              detail:''
          },{
              name:'FIXMIDGEN',
              value:'18',
              detail:''
          },{
              name:'FIXLONGGEN',
              value:'19',
              detail:''
          },{
              name:'FIXMMGOV',
              value:'20',
              detail:''
          },{
              name:'FIXMMGEN',
              value:'21',
              detail:''
          },{
              name:'FIXEMH',
              value:'22',
              detail:''
          },{
              name:'FIXEMDISC',
              value:'23',
              detail:''
          },{
              name:'FIXGLH',
              value:'24',
              detail:''
          },{
              name:'FIXGLDISC',
              value:'25',
              detail:''
          },{
              name:'MIXAGG',
              value:'26',
              detail:''
          },{
              name:'MIXMOD',
              value:'27',
              detail:''
          },{
              name:'MIXCONS',
              value:'28',
              detail:''
          },{
              name:'MIX2FI',
              value:'29',
              detail:''
          },{
              name:'PRFREE',
              value:'30',
              detail:''
          },{
              name:'PRMIX',
              value:'31',
              detail:''
          },{
              name:'PRFOPTH',
              value:'32',
              detail:''
          },{
              name:'PRFOPMIX',
              value:'33',
              detail:''
          },{
              name:'PRFOPGL',
              value:'34',
              detail:''
          },{
              name:'COMINDEX',
              value:'35',
              detail:''
          },{
              name:'COMENG',
              value:'36',
              detail:''
          },{
              name:'COMPM',
              value:'37',
              detail:''
          },{
              name:'COMAGR',
              value:'38',
              detail:''
          },{
              name:'MISC',
              value:'39',
              detail:''
          },
      ];
      return fundtype[id-1].name;
   }   
</script>      
@endsection