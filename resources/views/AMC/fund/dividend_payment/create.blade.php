@extends('layouts.app')
@section('content')

<div class="row">
	<div class="container">
		{!! Form::open(['route' => ['amc.fund.store_dividend', $fund->id], 'class' => 'form-horizontal', 'id' => 'form-fund']) !!}

            <h3>Dividend Payment</h3>
            <section>
				@include('fund.amc.partials._form-dividend')
            </section>
			
		{!! Form::close() !!}

		@include('fund.amc.partials._template-dividend')

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
		    onInit: function (event, current) {
		        $('.actions > ul > li:first-child').attr('style', 'display:none');
		    },
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

    <!-- add field dividend payment -->
    <script type="text/javascript">
        var next_dividend_index = 1

        $('#btn-add-dividend').click( function () {
            var template = $('#template-dividend').html()
            template = template.replace(new RegExp("ROW_INDEX", 'g'), next_dividend_index)
            $('#pane-add-dividend').append(template)
            next_dividend_index++
        });
    </script>

@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="/css/form.css">
@endsection