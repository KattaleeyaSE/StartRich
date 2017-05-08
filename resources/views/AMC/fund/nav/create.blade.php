@extends('layouts.app')
@section('content')

<div class="row">
	<div class="container">
		{!! Form::open(['route' => ['amc.fund.store_nav', $fund->id], 'class' => 'form-horizontal', 'id' => 'form-fund']) !!}

            <h3>NAV</h3>
            <section>
				@include('fund.amc.partials._form-nav')
            </section>
			
		{!! Form::close() !!}

		@include('fund.amc.partials._template-nav')

	</div>
</div>

@endsection

@section('script')

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<script type="text/javascript">
        var form = $("#form-fund");

        form.validate({
            errorPlacement: function errorPlacement(error, element) { element.before(error); },
            rules: {
                confirm: {
                    equalTo: "#password"
                }
            }
        });
        
		form.steps({
		    headerTag: "h3",
		    bodyTag: "section",
		    transitionEffect: "slideLeft",
		    autoFocus: true,
            onStepChanging: function (event, currentIndex, newIndex)
            {
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onFinishing: function (event, currentIndex)
            {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function (event, currentIndex)
            {
            	console.log($(this))
                $(this).submit();
            }
		});
	</script>

	<!-- add field nav -->
	<script type="text/javascript">
		var next_nav_index = 1

		$('#btn-add-nav').click( function () {
			var template = $('#template-nav').html()
			template = template.replace(new RegExp("ROW_INDEX", 'g'), next_nav_index)
			$('#pane-add-nav').append(template)
			next_nav_index++
		});
	</script>

@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="/css/form.css">
@endsection