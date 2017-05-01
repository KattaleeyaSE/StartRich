<div id="template-nav" style="visibility: hidden;">
	<div class="row">
		<div class="col-md-2">
				<div class="form-group{{ $errors->has('navs.*.modified_date') ? ' has-error' : '' }}">
				    {!! Form::label('navs[ROW_INDEX][modified_date]', 'Modified Date *', ['class' => 'control-label']) !!}
				    {!! Form::date('navs[ROW_INDEX][modified_date]', null,['class' => 'form-control']) !!}
				        @if ($errors->has('navs[ROW_INDEX][modified_date]'))
				            <span class="help-block">
				                <strong>{{ $errors->first('navs.*.modified_date') }}</strong>
				            </span>
				        @endif
				</div>
		</div>

		<div class="col-md-1">
				<div class="form-group{{ $errors->has('navs.*.standard') ? ' has-error' : '' }}">
				    {!! Form::label('navs[ROW_INDEX][standard]', 'Standard *', ['class' => 'control-label']) !!}
				    {!! Form::text('navs[ROW_INDEX][standard]', null,['class' => 'form-control']) !!}
				        @if ($errors->has('navs[ROW_INDEX][standard]'))
				            <span class="help-block">
				                <strong>{{ $errors->first('navs.*.standard') }}</strong>
				            </span>
				        @endif
				</div>
		</div>

		<div class="col-md-1">
				<div class="form-group{{ $errors->has('navs.*.bid') ? ' has-error' : '' }}">
				    {!! Form::label('navs[ROW_INDEX][bid]', 'Bid *', ['class' => 'control-label']) !!}
				    {!! Form::text('navs[ROW_INDEX][bid]', null,['class' => 'form-control']) !!}
				        @if ($errors->has('navs[ROW_INDEX][bid]'))
				            <span class="help-block">
				                <strong>{{ $errors->first('navs.*.bid') }}</strong>
				            </span>
				        @endif
				</div>
		</div>

		<div class="col-md-1">
				<div class="form-group{{ $errors->has('navs.*.offer') ? ' has-error' : '' }}">
				    {!! Form::label('navs[ROW_INDEX][offer]', 'Offer *', ['class' => 'control-label']) !!}
				    {!! Form::text('navs[ROW_INDEX][offer]', null,['class' => 'form-control']) !!}
				        @if ($errors->has('navs[ROW_INDEX][offer]'))
				            <span class="help-block">
				                <strong>{{ $errors->first('navs.*.offer') }}</strong>
				            </span>
				        @endif
				</div>
		</div>
	</div>
</div>