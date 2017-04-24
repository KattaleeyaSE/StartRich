@extends('layouts.app')
@section('content')

	<div class="container-fluid">

        <div class="panel panel-default">
            <div class="panel-heading">AMC : Create Fund</div>
            <div class="panel-body">

				{!! Form::open(['route' => 'amc.fund.store', 'class' => 'form-horizontal', 'id' => 'form-fund']) !!}

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

                    <h3>Dividend Payment</h3>
                    <section>
                        @include('fund.amc.partials._form-dividend')
                    </section>

				    <h3>Asset Allocation</h3>
				    <section>
						@include('fund.amc.partials._form-asset-allocation')
				    </section>

                    <h3>Holding Company</h3>
                    <section>
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

@endsection

@section('script')

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
	<script type="text/javascript">
		$("#form-fund").steps({
		    headerTag: "h3",
		    bodyTag: "section",
		    transitionEffect: "slideLeft",
		    autoFocus: true,
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
@endsection

@section('style')
	<style type="text/css">
		/*
    Common 
*/

.wizard,
.tabcontrol
{
    display: block;
    width: 100%;
    overflow: hidden;
}

.wizard a,
.tabcontrol a
{
    outline: 0;
}

.wizard ul,
.tabcontrol ul
{
    list-style: none !important;
    padding: 0;
    margin: 0;
}

.wizard ul > li,
.tabcontrol ul > li
{
    display: block;
    padding: 0;
}

/* Accessibility */
.wizard > .steps .current-info,
.tabcontrol > .steps .current-info
{
    position: absolute;
    left: -999em;
}

.wizard > .content > .title,
.tabcontrol > .content > .title
{
    position: absolute;
    left: -999em;
}



/*
    Wizard
*/

.wizard > .steps
{
    position: relative;
    display: block;
    width: 100%;
}

.wizard.vertical > .steps
{
    display: inline;
    float: left;
    width: 30%;
}

.wizard > .steps .number
{
    font-size: 1.429em;
}

.wizard > .steps > ul > li
{
    width: 25%;
}

.wizard > .steps > ul > li,
.wizard > .actions > ul > li
{
    float: left;
}

.wizard.vertical > .steps > ul > li
{
    float: none;
    width: 100%;
}

.wizard > .steps a,
.wizard > .steps a:hover,
.wizard > .steps a:active
{
    display: block;
    width: auto;
    margin: 0 0.5em 0.5em;
    padding: 1em 1em;
    text-decoration: none;

    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
}

.wizard > .steps .disabled a,
.wizard > .steps .disabled a:hover,
.wizard > .steps .disabled a:active
{
    background: #eee;
    color: #aaa;
    cursor: default;
}

.wizard > .steps .current a,
.wizard > .steps .current a:hover,
.wizard > .steps .current a:active
{
    background: #2184be;
    color: #fff;
    cursor: default;
}

.wizard > .steps .done a,
.wizard > .steps .done a:hover,
.wizard > .steps .done a:active
{
    background: #9dc8e2;
    color: #fff;
}

.wizard > .steps .error a,
.wizard > .steps .error a:hover,
.wizard > .steps .error a:active
{
    background: #ff3111;
    color: #fff;
}

.wizard > .content
{
    background: #eee;
    display: block;
    margin: 0.5em;
    min-height: 35em;
    overflow: scroll;
    position: relative;
    width: auto;

    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
}

.wizard.vertical > .content
{
    display: inline;
    float: left;
    margin: 0 2.5% 0.5em 2.5%;
    width: 65%;
}

.wizard > .content > .body
{
    float: left;
    position: absolute;
    width: 95%;
    height: 95%;
    padding: 2.5%;
}

.wizard > .content > .body ul
{
    list-style: disc !important;
}

.wizard > .content > .body ul > li
{
    display: list-item;
}

.wizard > .content > .body > iframe
{
    border: 0 none;
    width: 100%;
    height: 100%;
}

.wizard > .content > .body input
{
    display: block;
    border: 1px solid #ccc;
}

.wizard > .content > .body input[type="checkbox"]
{
    display: inline-block;
}

.wizard > .content > .body input.error
{
    background: rgb(251, 227, 228);
    border: 1px solid #fbc2c4;
    color: #8a1f11;
}

.wizard > .content > .body label
{
    display: inline-block;
    margin-bottom: 0.5em;
}

.wizard > .content > .body label.error
{
    color: #8a1f11;
    display: inline-block;
    margin-left: 1.5em;
}

.wizard > .actions
{
    position: relative;
    display: block;
    text-align: right;
    width: 100%;
}

.wizard.vertical > .actions
{
    display: inline;
    float: right;
    margin: 0 2.5%;
    width: 95%;
}

.wizard > .actions > ul
{
    display: inline-block;
    text-align: right;
}

.wizard > .actions > ul > li
{
    margin: 0 0.5em;
}

.wizard.vertical > .actions > ul > li
{
    margin: 0 0 0 1em;
}

.wizard > .actions a,
.wizard > .actions a:hover,
.wizard > .actions a:active
{
    background: #2184be;
    color: #fff;
    display: block;
    padding: 0.5em 1em;
    text-decoration: none;

    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
}

.wizard > .actions .disabled a,
.wizard > .actions .disabled a:hover,
.wizard > .actions .disabled a:active
{
    background: #eee;
    color: #aaa;
}

.wizard > .loading
{
}

.wizard > .loading .spinner
{
}



/*
    Tabcontrol
*/

.tabcontrol > .steps
{
    position: relative;
    display: block;
    width: 100%;
}

.tabcontrol > .steps > ul
{
    position: relative;
    margin: 6px 0 0 0;
    top: 1px;
    z-index: 1;
}

.tabcontrol > .steps > ul > li
{
    float: left;
    margin: 5px 2px 0 0;
    padding: 1px;

    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}

.tabcontrol > .steps > ul > li:hover
{
    background: #edecec;
    border: 1px solid #bbb;
    padding: 0;
}

.tabcontrol > .steps > ul > li.current
{
    background: #fff;
    border: 1px solid #bbb;
    border-bottom: 0 none;
    padding: 0 0 1px 0;
    margin-top: 0;
}

.tabcontrol > .steps > ul > li > a
{
    color: #5f5f5f;
    display: inline-block;
    border: 0 none;
    margin: 0;
    padding: 10px 30px;
    text-decoration: none;
}

.tabcontrol > .steps > ul > li > a:hover
{
    text-decoration: none;
}

.tabcontrol > .steps > ul > li.current > a
{
    padding: 15px 30px 10px 30px;
}

.tabcontrol > .content
{
    position: relative;
    display: inline-block;
    width: 100%;
    height: 35em;
    overflow: hidden;
    border-top: 1px solid #bbb;
    padding-top: 20px;
}

.tabcontrol > .content > .body
{
    float: left;
    position: absolute;
    width: 95%;
    height: 95%;
    padding: 2.5%;
}

.tabcontrol > .content > .body ul
{
    list-style: disc !important;
}

.tabcontrol > .content > .body ul > li
{
    display: list-item;
}
	</style>
@endsection