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

// Performance Chart
  google.charts.setOnLoadCallback(drawChart1);

  function drawChart1() {
    var data = google.visualization.arrayToDataTable({!!json_encode($performance_data)!!});

    var options = {
      title: 'Company Performance',
      curveType: 'function',
      legend: { position: 'bottom' }
    };

    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

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

// Holding Company Chart
  google.charts.setOnLoadCallback(drawChart2);

      function drawChart2() {
        var data = google.visualization.arrayToDataTable({!!json_encode($holding_company_data)!!});

        var options = {
          title: 'Holding Company',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_holding_company'));
        chart.draw(data, options);
      }
</script>
@endsection