@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit AMC Profile : {{Auth::user()->username}}</div>

                <div class="panel-body"> 
                    <form action="{{url('amc/profile')}}" method="post"  class="form-horizontal" data-toggle="validator">
                        {!!csrf_field()!!}
                        {!! method_field('patch') !!}
                        <input type="hidden" name="id" value="{{Auth::user()->id}}"/>
                        @include('AMC.partials.form', ['amc'=> $amc ,'submit_text' => 'Edit'])
                    </from> 
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
@endsection