@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">AMC : Suitability Test</div> 
                <div class="panel-body">
                    <a href="{{url('')}}" class="btn btn-success">Create</a>
                </div>
                <div class="panel-body">  
                <div class="table-responsive">
                    <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">AMC name</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Created Date</th>
                                <th class="text-center">Updated Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($suitabilityTests as $item)
                                <tr>
                                    <td class="text-center">{{$item->amc->company_name}}</td>
                                    <td class="text-center">{{$item->name}}</td> 
                                    <td class="text-center">{{$item->description}}</td> 
                                    <td class="text-center">{{$item->created_at}}</td> 
                                    <td class="text-center">{{$item->updated_at}}</td> 
                                    <td class="text-center">
                                        <a href="{{url(''.$item->id)}}" class="btn btn-primary">View</a> | <a href="" class="btn btn-warning">Edit</a> | <a href="" class="btn btn-danger">Delete</a>
                                    </td> 
                                </tr> 
                            @endforeach
                            </tbody>
                        </table>  
                    </div>
                      <div class="text-center">
                        {{ $suitabilityTests->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
