@extends('fund.master.show')

@section('fund-content')
    @include('AMC.fund.tabs.fund-detail')
    @include('AMC.fund.tabs.nav-daily')
    @include('AMC.fund.tabs.investment-policy')
    @include('AMC.fund.tabs.types-of-investor')
    @include('AMC.fund.tabs.major-risk-factor')
    @include('AMC.fund.tabs.lists-of-the-fund-manager')
    @include('AMC.fund.tabs.subscription-and-redemption-detail')
    @include('AMC.fund.tabs.past-performance')
    @include('AMC.fund.tabs.historical-dividend-payment')
    @include('AMC.fund.tabs.portfolio')
@endsection