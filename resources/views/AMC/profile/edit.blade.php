@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit AMC Profile : {{Auth::user()->username}}</div>

                <div class="panel-body"> 
                    <form action="{{url('amc/profile')}}" method="post"  class="form-horizontal">
                        {!!csrf_field()!!}
                        {!! method_field('patch') !!}
                        <input type="hidden" name="id" value="{{Auth::user()->amc->id}}"/>
                        @include('AMC.profile.partials.form', ['amc'=> $amc ,'submit_text' => 'Edit'])
                    </from> 
                </div>

            </div>
        </div>
    </div>
</div>
@endsection