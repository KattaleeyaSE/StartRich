@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Fund</div>
                    <div class="panel-body">
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <th>Modified date</th>
                                <th>Fund code</th>
                                <th>Fund name</th>
                                <th>Fund normal type</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach($funds as $fund)
                                    <tr>
                                        <td>{{$fund->updated_at}}</td>
                                        <td>{{$fund->code}}</td>
                                        <td>{{$fund->name}}</td>
                                        <td>{{$fund->type}}</td>
                                        <td>
                                            <a href="{{ route('member.fund.show', $fund->id) }}" class="btn btn-xs btn-info">view</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Delete Form--}}

@endsection
