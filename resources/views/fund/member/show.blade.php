@extends('fund.master.show')

@section('fund-content')
    @include('fund.member.tabs.show.fund-detail')
    @include('fund.member.tabs.show.nav-daily')
    @include('fund.member.tabs.show.investment-policy')
    @include('fund.member.tabs.show.types-of-investor')
    @include('fund.member.tabs.show.major-risk-factor')
    @include('fund.member.tabs.show.lists-of-the-fund-manager')
    @include('fund.member.tabs.show.subscription-and-redemption-detail')
    @include('fund.member.tabs.show.past-performance')
    @include('fund.member.tabs.show.historical-dividend-payment')
    @include('fund.member.tabs.show.portfolio')
@endsection