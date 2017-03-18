@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Member Profile : {{Auth::user()->username}}</div>

                <div class="panel-body"> 
                    <form action="{{url('member/profile')}}" method="post"  class="form-horizontal">
                        {!!csrf_field()!!}
                        {!! method_field('patch') !!}
                        <input type="hidden" name="id" value="{{Auth::user()->id}}"/>
                        @include('member.partials.form', ['member'=> $member ,'submit_text' => 'Edit'])
                    </from> 
                </div>

            </div>
        </div>
    </div>
</div>
@endsection