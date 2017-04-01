@extends('layouts.app')

@section('content')
    <div class="container" ng-controller="suitabilityTestController" ng-cloak>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">AMC : Create Fund</div>

                    <div class="panel-body">
                        <div>
                            <label>Name:</label>
                            <input type="text" class="form-control" />
                            <label>Password:</label>
                            <input type="text" class="form-control" />
                        </div>

                        <h2>Inline form</h2>
                        <div class="form-inline">
                            <label>Username:</label>
                            <input type="text" class="form-control" />
                            <label>Password:</label>
                            <input type="text" class="form-control" />
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
