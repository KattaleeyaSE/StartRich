<a class="btn btn-primary" id="btn-add-manager"> + </a>

	<div class="row">
		<div class="form-group{{ $errors->has('managers.*.name') ? ' has-error' : '' }}">
		    {!! Form::label('managers[0][name]', 'Manager Name *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
		    <div class="col-md-6 col-sm-6 col-xs-12">
		    {!! Form::text('managers[0][name]', null,['class' => 'form-control col-md-7 col-xs-12 required', 'required' => 'required', 'maxlength' => '255', 'pattern' => '^[_A-z0-9]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		    </div>
		        @if ($errors->has('managers.*.name'))
		            <span class="help-block">
		                <strong>{{ $errors->first('managers.*.name') }}</strong>
		            </span>
		        @endif
		</div>
		<div class="form-group{{ $errors->has('managers.*.position') ? ' has-error' : '' }}">
		    {!! Form::label('managers[0][position]', 'Manager Position *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
		    <div class="col-md-6 col-sm-6 col-xs-12">
		    {!! Form::text('managers[0][position]', null,['class' => 'form-control col-md-7 col-xs-12 required', 'required' => 'required', 'maxlength' => '255', 'pattern' => '^[_A-z0-9]{1,}$']) !!}
		    <div class="help-block with-errors"></div>
		    </div>
		        @if ($errors->has('managers.*.position'))
		            <span class="help-block">
		                <strong>{{ $errors->first('managers.*.position') }}</strong>
		            </span>
		        @endif
		</div>
		<div class="form-group{{ $errors->has('managers.*.management_date') ? ' has-error' : '' }}">
		    {!! Form::label('managers[0][management_date]', 'Management Date *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
		    <div class="col-md-6 col-sm-6 col-xs-12">
		    {!! Form::date('managers[0][management_date]', null,['class' => 'form-control col-md-7 col-xs-12 required', 'required' => 'required']) !!}
		    <div class="help-block with-errors"></div>
		    </div>
		        @if ($errors->has('managers.*.management_date'))
		            <span class="help-block">
		                <strong>{{ $errors->first('managers.*.management_date') }}</strong>
		            </span>
		        @endif
		</div>
			
	</div>

<div id="pane-add-manager"></div>