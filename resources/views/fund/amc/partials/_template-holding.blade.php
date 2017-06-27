<div id="template-company" style="visibility: hidden;">

	<div class="row">
		<div class="form-group{{ $errors->has('companies.ROW_INDEX.name') ? ' has-error' : '' }}">
		    {!! Form::label('companies[ROW_INDEX][name]', 'Company Name *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
		    <div class="col-md-6 col-sm-6 col-xs-12">
		    {!! Form::text('companies[ROW_INDEX][name]', null,['class' => 'form-control col-md-7 col-xs-12 required', 'required' => 'required', 'maxlength' => '255']) !!}
		    <div class="help-block with-errors"></div>
		    </div>
		        @if ($errors->has('companies.ROW_INDEX.name'))
		            <span class="help-block">
		                <strong>{{ $errors->first('companies.ROW_INDEX.name') }}</strong>
		            </span>
		        @endif
		</div>

		<div class="form-group{{ $errors->has('companies.ROW_INDEX.percentage') ? ' has-error' : '' }}">
		    {!! Form::label('companies[ROW_INDEX][percentage]', 'Percentage *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
		    <div class="col-md-6 col-sm-6 col-xs-12">
		    {!! Form::text('companies[ROW_INDEX][percentage]', null,['class' => 'form-control col-md-7 col-xs-12 required shares', 'required' => 'required', 'maxlength' => '10']) !!}
		    <div class="help-block with-errors"></div>
		    </div>
		        @if ($errors->has('companies.ROW_INDEX.percentage'))
		            <span class="help-block">
		                <strong>{{ $errors->first('companies.ROW_INDEX.percentage') }}</strong>
		            </span>
		        @endif
		</div>			
	</div>

</div>