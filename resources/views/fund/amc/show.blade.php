@extends('fund.master.show')

@section('fund-content')
    @include('fund.amc.tabs.fund-detail')
    @include('fund.amc.tabs.nav-daily')
    @include('fund.amc.tabs.investment-policy')
    @include('fund.amc.tabs.types-of-investor')
    @include('fund.amc.tabs.major-risk-factor')
    @include('fund.amc.tabs.lists-of-the-fund-manager')
    @include('fund.amc.tabs.subscription-and-redemption-detail')
    @include('fund.amc.tabs.past-performance')
    @include('fund.amc.tabs.historical-dividend-payment')
    @include('fund.amc.tabs.portfolio')
@endsection