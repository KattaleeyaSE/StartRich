<a class="btn btn-primary" id="btn-add-company"> + </a>

	<div class="row">
		<div class="form-group{{ $errors->has('companies.*.name') ? ' has-error' : '' }}">
		    {!! Form::label('companies[0][name]', 'Company Name *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
		    <div class="col-md-6 col-sm-6 col-xs-12">
		    {!! Form::text('companies[0][name]', null,['class' => 'form-control col-md-7 col-xs-12 required', 'required' => 'required', 'maxlength' => '255', 'pattern' => '^[A-z0-9 ]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		    </div>
		        @if ($errors->has('companies.*.name'))
		            <span class="help-block">
		                <strong>{{ $errors->first('companies.*.name') }}</strong>
		            </span>
		        @endif
		</div>

		<div class="form-group{{ $errors->has('companies.*.percentage') ? ' has-error' : '' }}">
		    {!! Form::label('companies[0][percentage]', 'Percentage *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
		    <div class="col-md-6 col-sm-6 col-xs-12">
		    {!! Form::text('companies[0][percentage]', null,['class' => 'form-control col-md-7 col-xs-12 required', 'required' => 'required', 'maxlength' => '10', 'pattern' => '^[0-9.]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		    </div>
		        @if ($errors->has('companies.*.percentage'))
		            <span class="help-block">
		                <strong>{{ $errors->first('companies.*.percentage') }}</strong>
		            </span>
		        @endif
		</div>			
	</div>

<div id="pane-add-company"></div>