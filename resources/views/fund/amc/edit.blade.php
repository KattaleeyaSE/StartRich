@extends('layouts.app')
@section('content')

<div class="row">
	<div class="container">
		{!! Form::model($fund, ['route' => ['amc.fund.update', $fund->id], 'method' => 'PATCH', 'class' => 'form-horizontal', 'id' => 'form-fund', 'data-toggle' => 'validator']) !!}

	        <h3>Fund Information</h3>
	        <section>
				@include('fund.amc.partials._form-fund')
	        </section>
			
		{!! Form::close() !!}
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
    <script type="text/javascript">
        var funds = {!! json_encode($funds) !!}
        $('#create-fund-name').change( function () {
            if ($.inArray($(this).val(), funds) >= 0) {
                $(this).parent().addClass('has-error');
                $(this).parent().children('.with-errors').html('<span id="duplicate">Fund name is already in the database</span>');
            } else {
                $(this).parent().removeClass('has-error');
                $(this).parent().children('.with-errors').children('#duplicate').remove();
            }
        });
    </script>
    <script type="text/javascript">
        var codes = {!! json_encode($codes) !!}
        $('#create-fund-code').change( function () {
            if ($.inArray($(this).val(), codes) >= 0) {
                $(this).parent().addClass('has-error');
                $(this).parent().children('.with-errors').html('<span id="duplicate">Fund code is already in the database</span>');
            } else {
                $(this).parent().removeClass('has-error');
                $(this).parent().children('.with-errors').children('#duplicate').remove();
            }
        });
    </script>
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="/css/form.css">
@endsection