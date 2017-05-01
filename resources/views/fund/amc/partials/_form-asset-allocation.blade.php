@if(isset($fund) && $fund->asset_allocation != null)
	<div class="form-group{{ $errors->has('stock') ? ' has-error' : '' }}">
	    {!! Form::label('stock', 'Stock *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'stock']) !!}
	    <div class="col-md-6 col-sm-6 col-xs-12">
	    {!! Form::text('stock', $fund->asset_allocation->stock,['class' => 'form-control col-md-7 col-xs-12 required']) !!}
	    </div>
	        @if ($errors->has('stock'))
	            <span class="help-block">
	                <strong>{{ $errors->first('stock') }}</strong>
	            </span>
	        @endif
	</div>
	<div class="form-group{{ $errors->has('bond') ? ' has-error' : '' }}">
	    {!! Form::label('bond', 'Bond *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'bond']) !!}
	    <div class="col-md-6 col-sm-6 col-xs-12">
	    {!! Form::text('bond', $fund->asset_allocation->bond,['class' => 'form-control col-md-7 col-xs-12 required']) !!}
	    </div>
	        @if ($errors->has('bond'))
	            <span class="help-block">
	                <strong>{{ $errors->first('bond') }}</strong>
	            </span>
	        @endif
	</div>
	<div class="form-group{{ $errors->has('cash') ? ' has-error' : '' }}">
	    {!! Form::label('cash', 'Cash *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'cash']) !!}
	    <div class="col-md-6 col-sm-6 col-xs-12">
	    {!! Form::text('cash', $fund->asset_allocation->cash,['class' => 'form-control col-md-7 col-xs-12 required']) !!}
	    </div>
	        @if ($errors->has('cash'))
	            <span class="help-block">
	                <strong>{{ $errors->first('cash') }}</strong>
	            </span>
	        @endif
	</div>
	<div class="form-group{{ $errors->has('other') ? ' has-error' : '' }}">
	    {!! Form::label('other', 'Other *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'other']) !!}
	    <div class="col-md-6 col-sm-6 col-xs-12">
	    {!! Form::text('other', $fund->asset_allocation->other,['class' => 'form-control col-md-7 col-xs-12 required']) !!}
	    </div>
	        @if ($errors->has('other'))
	            <span class="help-block">
	                <strong>{{ $errors->first('other') }}</strong>
	            </span>
	        @endif
	</div>
@else
	<div class="form-group{{ $errors->has('stock') ? ' has-error' : '' }}">
	    {!! Form::label('stock', 'Stock *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'stock']) !!}
	    <div class="col-md-6 col-sm-6 col-xs-12">
	    {!! Form::text('stock', null,['class' => 'form-control col-md-7 col-xs-12 required']) !!}
	    </div>
	        @if ($errors->has('stock'))
	            <span class="help-block">
	                <strong>{{ $errors->first('stock') }}</strong>
	            </span>
	        @endif
	</div>
	<div class="form-group{{ $errors->has('bond') ? ' has-error' : '' }}">
	    {!! Form::label('bond', 'Bond *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'bond']) !!}
	    <div class="col-md-6 col-sm-6 col-xs-12">
	    {!! Form::text('bond', null,['class' => 'form-control col-md-7 col-xs-12 required']) !!}
	    </div>
	        @if ($errors->has('bond'))
	            <span class="help-block">
	                <strong>{{ $errors->first('bond') }}</strong>
	            </span>
	        @endif
	</div>
	<div class="form-group{{ $errors->has('cash') ? ' has-error' : '' }}">
	    {!! Form::label('cash', 'Cash *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'cash']) !!}
	    <div class="col-md-6 col-sm-6 col-xs-12">
	    {!! Form::text('cash', null,['class' => 'form-control col-md-7 col-xs-12 required']) !!}
	    </div>
	        @if ($errors->has('cash'))
	            <span class="help-block">
	                <strong>{{ $errors->first('cash') }}</strong>
	            </span>
	        @endif
	</div>
	<div class="form-group{{ $errors->has('other') ? ' has-error' : '' }}">
	    {!! Form::label('other', 'Other *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'for' => 'other']) !!}
	    <div class="col-md-6 col-sm-6 col-xs-12">
	    {!! Form::text('other', null,['class' => 'form-control col-md-7 col-xs-12 required']) !!}
	    </div>
	        @if ($errors->has('other'))
	            <span class="help-block">
	                <strong>{{ $errors->first('other') }}</strong>
	            </span>
	        @endif
	</div>
@endif
