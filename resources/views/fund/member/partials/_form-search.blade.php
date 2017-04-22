<div class="col-md-4">
    <div class="form-group">
        {!! Form::label('name', 'Fund Name', []) !!}    
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('type', 'General Fund Type', []) !!}    
        {!! Form::select('type', $fund_types, null, ['class' => 'form-control', 'placeholder' => '']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('payment_policy', 'Payment Policy', []) !!}
        {!! Form::select('payment_policy', [1 => 'Have', 0 => 'Not Have'], null, ['class' => 'form-control', 'placeholder' => '']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('min_first_purchase', 'Min First Purchase', []) !!}
        {!! Form::text('min_first_purchase', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="col-md-4 col-md-offset-1">
    <div class="form-group">
        {!! Form::label('code', 'Fund Code', []) !!}    
        {!! Form::text('code', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('protected_fund', 'Protected Fund', []) !!}
        {!! Form::select('protected_fund', [1 => 'Have', 0 => 'Not Have'], null, ['class' => 'form-control', 'placeholder' => '']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('risk_level', 'Risk Level', []) !!}
        {!! Form::select('risk_level', [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8], null, ['class' => 'form-control', 'placeholder' => '']) !!}
    </div>

    <div class="form-group">
        {!! Form::label(' ') !!}
        {!! Form::submit('Search', ['class' => 'btn btn-block btn-primary']) !!}
    </div>
</div>

<div class="col-md-2 col-md-offset-1">
    <a href="{{route('member.fund.index')}}" class="btn btn-default pull-right">Clear Filter</a>
    <div class="clearfix"></div>
</div>