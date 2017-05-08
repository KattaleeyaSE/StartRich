<a class="btn btn-primary" id="btn-add-nav"> + </a>

	<div class="row">
		<div class="col-md-2">
				<div class="form-group{{ $errors->has('navs.*.modified_date') ? ' has-error' : '' }}">
				    {!! Form::label('navs[0][modified_date]', 'Modified Date *', ['class' => 'control-label']) !!}
				    {!! Form::date('navs[0][modified_date]', null,['class' => 'form-control required']) !!}
				        @if ($errors->has('navs[0][modified_date]'))
				            <span class="help-block">
				                <strong>{{ $errors->first('navs.*.modified_date') }}</strong>
				            </span>
				        @endif
				</div>
		</div>

		<div class="col-md-1">
				<div class="form-group{{ $errors->has('navs.*.standard') ? ' has-error' : '' }}">
				    {!! Form::label('navs[0][standard]', 'Standard *', ['class' => 'control-label']) !!}
				    {!! Form::text('navs[0][standard]', null,['class' => 'form-control required']) !!}
				        @if ($errors->has('navs[0][standard]'))
				            <span class="help-block">
				                <strong>{{ $errors->first('navs.*.standard') }}</strong>
				            </span>
				        @endif
				</div>
		</div>

		<div class="col-md-1">
				<div class="form-group{{ $errors->has('navs.*.bid') ? ' has-error' : '' }}">
				    {!! Form::label('navs[0][bid]', 'Bid *', ['class' => 'control-label']) !!}
				    {!! Form::text('navs[0][bid]', null,['class' => 'form-control required']) !!}
				        @if ($errors->has('navs[0][bid]'))
				            <span class="help-block">
				                <strong>{{ $errors->first('navs.*.bid') }}</strong>
				            </span>
				        @endif
				</div>
		</div>

		<div class="col-md-1">
				<div class="form-group{{ $errors->has('navs.*.offer') ? ' has-error' : '' }}">
				    {!! Form::label('navs[0][offer]', 'Offer *', ['class' => 'control-label']) !!}
				    {!! Form::text('navs[0][offer]', null,['class' => 'form-control required']) !!}
				        @if ($errors->has('navs[0][offer]'))
				            <span class="help-block">
				                <strong>{{ $errors->first('navs.*.offer') }}</strong>
				            </span>
				        @endif
				</div>
		</div>
	</div>

<div id="pane-add-nav"></div>