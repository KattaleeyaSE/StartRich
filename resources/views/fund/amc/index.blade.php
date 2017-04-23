@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">AMC : Fund Management</div>
                    <div class="panel-body">
                        <a href="{{ route('amc.fund.create') }}" class="btn btn-success">Create</a>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <th>Modified date</th>
                                <th>Fund Code</th>
                                <th>Fund Name</th>
                                <th>Fund Normal Type</th>
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
                                            <a href="{{ route('amc.fund.show', $fund->id) }}" class="btn btn-xs btn-info">view</a>
                                            <a href="#" data-href="{{ route('amc.fund.destroy', $fund->id) }}" data-toggle="modal" data-target="#confirm-delete" class="btn btn-xs btn-danger">Delete</a>
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
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Confirmation
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this item?
                </div>
                <div class="modal-footer">
                {!! Form::open(['route' => ['amc.fund.destroy', 'temp'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $('#form-delete').attr('action', $(e.relatedTarget).data('href'))
    });
</script>
@endsection