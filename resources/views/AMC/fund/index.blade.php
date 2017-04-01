@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">AMC : Fund Management</div>
                    <div class="panel-body">
                        <a href="{{url('/amc/create')}}" class="btn btn-success">Create</a>
                    </div>
                    <div class="panel-body">

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Delete Form--}}

@endsection
