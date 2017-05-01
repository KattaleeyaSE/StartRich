<div id="template-manager" style="visibility: hidden;">

	<div class="row">
		<div class="form-group{{ $errors->has('managers.*.name') ? ' has-error' : '' }}">
		    {!! Form::label('managers[ROW_INDEX][name]', 'Manager Name *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
		    <div class="col-md-6 col-sm-6 col-xs-12">
		    {!! Form::text('managers[ROW_INDEX][name]', null,['class' => 'form-control col-md-7 col-xs-12']) !!}
		    </div>
		        @if ($errors->has('managers.*.name'))
		            <span class="help-block">
		                <strong>{{ $errors->first('managers.*.name') }}</strong>
		            </span>
		        @endif
		</div>
		<div class="form-group{{ $errors->has('managers.*.position') ? ' has-error' : '' }}">
		    {!! Form::label('managers[ROW_INDEX][position]', 'Manager Position *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
		    <div class="col-md-6 col-sm-6 col-xs-12">
		    {!! Form::text('managers[ROW_INDEX][position]', null,['class' => 'form-control col-md-7 col-xs-12']) !!}
		    </div>
		        @if ($errors->has('managers.*.position'))
		            <span class="help-block">
		                <strong>{{ $errors->first('managers.*.position') }}</strong>
		            </span>
		        @endif
		</div>
		<div class="form-group{{ $errors->has('managers.*.management_date') ? ' has-error' : '' }}">
		    {!! Form::label('managers[ROW_INDEX][management_date]', 'Management Date *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
		    <div class="col-md-6 col-sm-6 col-xs-12">
		    {!! Form::date('managers[ROW_INDEX][management_date]', null,['class' => 'form-control col-md-7 col-xs-12']) !!}
		    </div>
		        @if ($errors->has('managers.*.management_date'))
		            <span class="help-block">
		                <strong>{{ $errors->first('managers.*.management_date') }}</strong>
		            </span>
		        @endif
		</div>
			
	</div>
</div>