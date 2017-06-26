@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                Review Fund
            </div>
            <div class="panel-body">

                <h1>{{$fund->name}}</h1>

                @foreach($fund->reviews as $review)
                    <div class="well">
                        {{$review->description}}
                        <p><strong>{{$review->point}} point(s)</strong> | By: {{$review->member->firstname}} {{$review->member->lastname}}</p>
                    </div>
                @endforeach
            <hr>

            @if (!$fund->reviewedByMember(Auth::user()->member->id))
                {!! Form::open(['route' => ['member.fund.save_review', $fund->id], 'data-toggle' => 'validator']) !!}

                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                {!! Form::label('description', 'Description', ['class' => 'control-label', 'for' => 'description']) !!}
                                {!! Form::textarea('description', null,['class' => 'form-control']) !!}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('point') ? ' has-error' : '' }}">
                                <p>{!! Form::label('point', 'Point', ['class' => 'control-label', 'for' => 'point']) !!}</p>

                                {!! Form::radio('point', 0, false, ['required' => 'required']) !!} No point
                                {!! Form::radio('point', 1, false, ['required' => 'required']) !!} 1
                                {!! Form::radio('point', 2, false, ['required' => 'required']) !!} 2
                                {!! Form::radio('point', 3, false, ['required' => 'required']) !!} 3
                                {!! Form::radio('point', 4, false, ['required' => 'required']) !!} 4
                                {!! Form::radio('point', 5, false, ['required' => 'required']) !!} 5
                                <div class="help-block with-errors"></div>
                            </div>
                            <hr>
                            {!! Form::submit('Submit Review', ['class' => 'btn btn-block btn-primary']) !!}
                        </div>
                    </div>

                {!! Form::close() !!}
            @else
            
            @endif

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
@endsection