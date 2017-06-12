@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Member : Simulator</div> 
                
                {{-- <div class="panel-body">
                    <a href="{{url('estimateprofit/create')}}" class="btn btn-success">Create</a>
                </div> --}}

                <div class="panel-body">  
                <div class="table-responsive">
                    
                    {{-- Paging --}}
                    <div class="text-center">
                          <a href="{{url('/simulator/create')}}" class="btn btn-success">
                            Simulator Start !
                          </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

{{--Delete Form--}}
{{-- <form action="" method="post" id="deleteform">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
</form> --}}
@endsection
@section('script')
{{-- <script>
   $("[data-button-type=delete]").click(function(e) {
          e.preventDefault();
          var delete_button = $(this);
          var delete_url = $(this).attr('href');

          if (confirm("{{ trans('backpack::crud.delete_confirm') }}") == true) {
                $('#deleteform').attr('action',delete_url);
                $('#deleteform').submit();
            }
      }); 
</script>       --}}
@endsection