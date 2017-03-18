@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome AMC : {{Auth::user()->username}}</div>

                <div class="panel-body">
                  <p><strong>Username : </strong>{{Auth::user()->username}}</p>
                  <p><strong>Email : </strong>{{Auth::user()->email}}</p>
                  <p><strong>Company Name : </strong>{{Auth::user()->amc->company_name}}</p>
                  <p><strong>Phone Number : </strong>{{Auth::user()->amc->phone_number}}</p>
                  <p><strong>Address : </strong>{{Auth::user()->amc->address}}</p>
                  <a href="{{url('amc/profile/edit')}}" class="btn btn-primary">Edit Profile</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection