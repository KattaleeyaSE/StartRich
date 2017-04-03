@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body"> 
                    @if (Auth::guest())
                     Hello Guest
                        @elseif(!is_null(Auth::user()->amc))
                     Hello AMC
                        @elseif(!is_null(Auth::user()->member)) 
                     Hello Member
                        @elseif(!is_null(Auth::user()->admin)) 
                     Hello Admin
                    @endif                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection