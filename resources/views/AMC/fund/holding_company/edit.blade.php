@extends('layouts.app')
@section('content')

<div class="row">
	<div class="container">
		{!! Form::model($holding_company, ['route' => ['amc.fund.update_holding_company', $holding_company->id], 'method' => 'PATCH', 'class' => 'form-horizontal', 'id' => 'form-fund', 'data-toggle' => 'validator']) !!}
            <input type="hidden" name="qouta" value="{{$qouta}}">
            <h3>Holding Company</h3>
            <section>
                <div class="alert alert-danger exceed" style="display: none;">
                  <strong>The sum of shares is greather than 100%. The maximum is {{$qouta}}%.</strong>
                </div>
				@include('AMC.fund.holding_company.partials._form')
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
        $('.shares').change( function () {
            var qouta = parseInt($('input[name="qouta"]').val());
            var input = parseInt($(this).val());
            if ( input > qouta ) {
                alertSum();
            } else {
                hideSum();
            }
        });

    function alertSum()
    {
        $('.exceed').show();
        $('.assets').parent().addClass('has-error');
        $('a[href="#finish"]').css('cursor', 'not-allowed');
        $('a[href="#finish"]').attr('disabled', 'disabled');
    }

    function hideSum()
    {
        $('.exceed').hide();
        $('.assets').parent().removeClass('has-error');
        $('a[href="#finish"]').css('cursor', 'pointer');
    }
    </script>

@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="/css/form.css">
@endsection