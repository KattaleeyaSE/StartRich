@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Member : Create Estimate Profit</div>

                <div class="panel-body"> 
                    <form action="{{url('estimateprofit/store')}}" method="post"  class="form-horizontal">
                        {!!csrf_field()!!}
                        @include('member.partials.form', ['submit_text' => 'Register'])
                    </from> 
                </div>

            </div>
        </div>
    </div>
</div>
@endsection