@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome Member : {{Auth::user()->username}}</div>

                <div class="panel-body">
                  <p><strong>Username : </strong>{{Auth::user()->username}}</p>
                  <p><strong>Firstname : </strong>{{Auth::user()->member->firstname}}</p>
                  <p><strong>Lastname : </strong>{{Auth::user()->member->lastname}}</p>  
                  <p><strong>Email : </strong>{{Auth::user()->email}}</p>
                  <p><strong>Phone Number : </strong>{{Auth::user()->member->phone_number}}</p>
                  <a href="{{url('member/profile/edit')}}" class="btn btn-primary">Edit Profile</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection