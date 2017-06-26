@extends('layouts.app')
@section('content')

<div class="row">
	<div class="container">
		{!! Form::open(['route' => ['amc.fund.store_holding_company', $fund->id], 'class' => 'form-horizontal', 'id' => 'form-fund', 'data-toggle' => 'validator']) !!}

            <h3>Holding Company</h3>
            <section>
				@include('fund.amc.partials._form-holding')
            </section>
			
		{!! Form::close() !!}

		@include('fund.amc.partials._template-holding')

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

    <!-- add field holding company -->
    <script type="text/javascript">
        var next_company_index = 1

        $('#btn-add-company').click( function () {
            var template = $('#template-company').html()
            template = template.replace(new RegExp("ROW_INDEX", 'g'), next_company_index)
            $('#pane-add-company').append(template)
            next_company_index++
        });
    </script>

@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="/css/form.css">
@endsection