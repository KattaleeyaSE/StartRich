@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <ul id="fund-info-tabs" class="nav nav-tabs">
                          <li class="active"><a href="#fund-detail"         data-toggle="tab">fund detail</a></li>
                          <li><a href="#nav-daily"                          data-toggle="tab">NAV daily</a></li>
                          <li><a href="#investment-policy"                  data-toggle="tab">investment policy</a></li>
                          <li><a href="#types-of-investor"                  data-toggle="tab">types of investor</a></li>
                          <li><a href="#major-risk-factor"                  data-toggle="tab">major risk factor</a></li>
                          <li><a href="#lists-of-the-fund-manager"          data-toggle="tab">lists of the fund manager</a></li>
                          <li><a href="#subscription-and-redemption-detail" data-toggle="tab">subscription and redemption detail</a></li>
                          <li><a href="#past-performance"                   data-toggle="tab">past performance</a></li>
                          <li><a href="#historical-dividend-payment"        data-toggle="tab">historical dividend payment</a></li>
                          <li><a href="#portfolio"                          data-toggle="tab">portfolio</a></li>
                        </ul>

                          <!-- Tab panes -->
                          <div class="tab-content">
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
                          </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Delete Form--}}

@endsection

@section('script')
<script>
    $('#fund-info-tabs a').click(function (e) {
      e.preventDefault()
      $(this).tab('show')
    })
</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

// NAV Chart
  google.charts.load('current', {packages: ['corechart', 'line']});
  google.charts.setOnLoadCallback(drawBackgroundColor);

      function drawBackgroundColor() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'X');
        data.addColumn('number', 'Price');

        data.addRows({!!json_encode($navs)!!});

        var options = {
          hAxis: {
            title: 'Modified date'
          },
          vAxis: {
            title: 'Price (Bath)'
          },
          backgroundColor: '#f1f8e9'
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }

// Portfolio Chart
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable({!!json_encode($asset_allocation_data)!!});

        var options = {
          title: 'Asset Allocation',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
</script>
@endsection