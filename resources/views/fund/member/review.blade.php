@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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
                        {!! Form::open(['route' => ['member.fund.save_review', $fund->id]]) !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                            {!! Form::radio('point', 0, false, []) !!} No point
                            {!! Form::radio('point', 1, false, []) !!} 1
                            {!! Form::radio('point', 2, false, []) !!} 2
                            {!! Form::radio('point', 3, false, []) !!} 3
                            {!! Form::radio('point', 4, false, []) !!} 4
                            {!! Form::radio('point', 5, false, []) !!} 5
                            {!! Form::submit('Submit Review', ['class' => 'form-control']) !!}
                        {!! Form::close() !!}
                    @else
                        รีวิวไปแล้ว
                    @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection