@extends('backpack::layout')

@section('content-header')
	<section class="content-header">
	  <h1>
	    {{ trans('backpack::crud.preview') }} <span class="text-lowercase">{{ $crud->entity_name }}</span>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ url(config('backpack.base.route_prefix'), 'dashboard') }}">{{ trans('backpack::crud.admin') }}</a></li>
	    <li><a href="{{ url($crud->route) }}" class="text-capitalize">{{ $crud->entity_name_plural }}</a></li>
	    <li class="active">{{ trans('backpack::crud.preview') }}</li>
	  </ol>
	</section>
@endsection

@section('content')
	@if ($crud->hasAccess('list'))
		<a href="{{ url($crud->route) }}"><i class="fa fa-angle-double-left"></i> {{ trans('backpack::crud.back_to_all') }} <span class="text-lowercase">{{ $crud->entity_name_plural }}</span></a><br><br>
	@endif

	<!-- Default box -->
	  <div class="box">
	    <div class="box-header with-border">
	      <h3 class="box-title">
            {{ trans('backpack::crud.preview') }}
            <span class="text-lowercase">{{ $crud->entity_name }}</span>
          </h3>
	    </div>
	    <div class="box-body">
 						@foreach ($crud->getFields('update', $entry->getKey()) as $field)
            <!-- load the view from the application if it exists, otherwise load the one in the package --> 
               <div @include('crud::inc.field_wrapper_attributes') >
                    @if($field['type'] != 'hidden')
                    <label>{!! isset($field['label']) ? $field['label'] : ""  !!}</label> 
                    <div> 
										
											 @if($field['type'] =='checkbox')
											 				{{ isset($field['value']) && $field['value'] == true ? 'Yes' : 'No' }}
											 
											 @elseif($field['type'] =='number' && ( isset($field['isPriceFormat']) && $field['isPriceFormat'] == true))
											 				{!! isset($field['value']) ? number_format( $field['value'],2) : ""  !!}
											 
											 @else
                       		  {!! isset($field['value']) ? $field['value'] : ""  !!}
											 @endif

                    </div>
                    @endif
            </div>
         @endforeach 
	    </div><!-- /.box-body -->
	  </div><!-- /.box -->

@endsection


@section('after_styles')
	<link rel="stylesheet" href="{{ asset('vendor/backpack/crud/css/crud.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/backpack/crud/css/show.css') }}">
@endsection

@section('after_scripts')
	<script src="{{ asset('vendor/backpack/crud/js/crud.js') }}"></script>
	<script src="{{ asset('vendor/backpack/crud/js/show.js') }}"></script>
@endsection