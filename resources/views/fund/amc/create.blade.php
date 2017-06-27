@extends('layouts.app')
@section('content')

	<div class="container-fluid">

        <div class="panel panel-default">
            <div class="panel-heading">AMC : Create Fund</div>
            <div class="panel-body">

				{!! Form::open(['route' => 'amc.fund.store', 'class' => 'form-horizontal', 'id' => 'form-fund', 'data-toggle' => 'validator']) !!}

				    <h3>Fund</h3>
				    <section>
				    	@include('fund.amc.partials._form-fund')
				    </section>

				    <h3>NAV</h3>
				    <section>
				    	@include('fund.amc.partials._form-nav')
				    </section>

				    <h3>Investment Policy</h3>
				    <section>
				    	@include('fund.amc.partials._form-investment-policy')
				    </section>

				    <h3>Types of Investor</h3>
				    <section>
				    	@include('fund.amc.partials._form-types-of-investor')
				    </section>

				    <h3>Major Risk Factor</h3>
				    <section>
				    	@include('fund.amc.partials._form-major-risk-factor')
				    </section>

                    <h3>Fund Manager</h3>
                    <section>
                        @include('fund.amc.partials._form-manager')
                    </section>

                    <h3>Subscription & Redemption</h3>
                    <section>
                        @include('fund.amc.partials._form-subscription')
                    </section>

                    <h3>Past Performance</h3>
                    <section>
                        @include('fund.amc.partials._form-performance')
                    </section>

                    <h3>Dividend Payment</h3>
                    <section>
                        @include('fund.amc.partials._form-dividend')
                    </section>

                    <h3>Portfolio</h3>
                    <section>
                <div class="alert alert-danger exceed" style="display: none;">
                  <strong>The sum of these inputs is greather than 100%.</strong>
                </div>
                        @include('fund.amc.partials._form-asset-allocation')
                <div class="alert alert-danger exceedHolding" style="display: none;">
                  <strong>The sum of these inputs is greather than 100%.</strong>
                </div>
                        @include('fund.amc.partials._form-holding')
                    </section>

				{!! Form::close() !!}
            </div>
        </div>
</div>

@include('fund.amc.partials._template-nav')
@include('fund.amc.partials._template-manager')
@include('fund.amc.partials._template-holding')
@include('fund.amc.partials._template-dividend')
@include('fund.amc.partials._template-subscription')
@include('fund.amc.partials._template-performance')

@endsection

@section('script')

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>

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
                $("#create-fund-return").val($("#create-fund-name").val());
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
                var sumHolding = 0;
                $('.shares').each( function () {
                    val = parseInt($(this).val());
                    val = isNaN(val) ? 0 : val;
                    sumHolding += val;
                });

                if (sumHolding > 100) {
                    $('.exceedHolding').show();
                    $('.shares').parent().addClass('has-error');
                    // $('a[href="#finish"]').css('cursor', 'not-allowed');
                    // $('a[href="#finish"]').attr('disabled', 'disabled');
                } else {
                    $('.exceedHolding').hide();
                    $('.shares').parent().removeClass('has-error');
                    // $('a[href="#finish"]').css('cursor', 'pointer');
                    $(this).submit();
                }

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

    <!-- add field fund manager -->
    <script type="text/javascript">
        var next_manager_index = 1

        $('#btn-add-manager').click( function () {
            var template = $('#template-manager').html()
            template = template.replace(new RegExp("ROW_INDEX", 'g'), next_manager_index)
            $('#pane-add-manager').append(template)
            next_manager_index++
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

    <!-- add field fee -->
    <script type="text/javascript">
        var next_fee_index = 1

        $('#btn-add-fee').click( function () {
            var template = $('#template-fee').html()
            template = template.replace(new RegExp("ROW_INDEX", 'g'), next_fee_index)
            $('#pane-add-fee').append(template)
            next_fee_index++
        });
    </script>

    <!-- add field pruchase -->
    <script type="text/javascript">
        var next_purchase_index = 1

        $('#btn-add-purchase').click( function () {
            var template = $('#template-purchase').html()
            template = template.replace(new RegExp("ROW_INDEX", 'g'), next_purchase_index)
            $('#pane-add-purchase').append(template)
            next_purchase_index++
        });
    </script>

    <!-- add field expense -->
    <script type="text/javascript">
        var next_expense_index = 1

        $('#btn-add-expense').click( function () {
            var template = $('#template-expense').html()
            template = template.replace(new RegExp("ROW_INDEX", 'g'), next_expense_index)
            $('#pane-add-expense').append(template)
            next_expense_index++
        });
    </script>

    <!-- add field performance -->
    <script type="text/javascript">
        var next_performance_index = 2

        $('#btn-add-performance').click( function () {
            var template = $('#template-performance').html()
            template = template.replace(new RegExp("DEFAULT_ROW_NAME", 'g'), "Benchmark " + next_performance_index)
            $('#pane-add-performance').append(template)
            next_performance_index++
        });
    </script>

    <script type="text/javascript">

    $('.assets').change( function () {
        var sum = 0;
        var val = 0;

        $('.assets').each( function () {
            val = parseInt($(this).val());
            val = isNaN(val) ? 0 : val;
            sum += val;
        });

        if (sum > 100) {
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
    <style>
        input.ng-invalid, input.ng-invalid:focus {
            border-color: #a94442 !;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        }

        .error {
            color: #a94442;
        }

        .has-error .form-control {
            border-color: #a94442 !important;
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075) !important;
        }
    </style>
@endsection