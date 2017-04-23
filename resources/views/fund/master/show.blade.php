@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul id="fund-info-tabs" class="nav nav-pills nav-stacked">
                            <li class="active"><a href="#fund-detail"         data-toggle="tab">Fund Detail</a></li>
                            <li><a href="#nav-daily"                          data-toggle="tab">NAV Daily</a></li>
                            <li><a href="#investment-policy"                  data-toggle="tab">Investment Policy</a></li>
                            <li><a href="#types-of-investor"                  data-toggle="tab">Types of Investor</a></li>
                            <li><a href="#major-risk-factor"                  data-toggle="tab">Major Risk Factor</a></li>
                            <li><a href="#lists-of-the-fund-manager"          data-toggle="tab">Lists of The Fund Manager</a></li>
                            <li><a href="#subscription-and-redemption-detail" data-toggle="tab">Subscription & Redemption Detail</a></li>
                            <li><a href="#past-performance"                   data-toggle="tab">Past Performance</a></li>
                            <li><a href="#historical-dividend-payment"        data-toggle="tab">Historical Dividend Payment</a></li>
                            <li><a href="#portfolio"                          data-toggle="tab">Portfolio</a></li>
                        </ul>
                      </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="tab-content">
                            @yield('fund-content')
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="/js/libs/Chart.min.js"></script>
<!-- holding chart -->
<script>
    var data = {
        labels: [
                    @foreach($fund->holding_companies->sortBy('id') as $company)
                        "{{$company->name}}", 
                    @endforeach
            ],
        datasets: [
            {
                data: [
                        @foreach($fund->holding_companies->sortBy('id') as $company)
                            "{{$company->percentage}}", 
                        @endforeach
                    ],
                backgroundColor: [
                    "#FF6384",
                    "#36A2EB",
                    "#FFCE56",
                    "#F08080",
                    "#FF00FF",
                    "#58D68D",
                    "#D2B4DE",
                    "#D35400",
                    "#641E16",
                    "#212F3C"
                ]
            }]
    };

    var myPieChart = new Chart($("#holding-chart"),{
        type: 'pie',
        data: data
    });
</script>

<!-- asset allocation chart -->
<script>
    var data = {
        labels: ['Stock', 'Bond', 'Cash', 'Other'],
        datasets: [
            {
                data: {!!json_encode($fund->getAssetAllocationData())!!},
                backgroundColor: [
                    "#FF6384",
                    "#36A2EB",
                    "#FFCE56"
                ]
            }]
    };

    var myPieChart = new Chart($("#asset-chart"),{
        type: 'pie',
        data: data
    });
</script>

<!-- nav chart -->
<script>
    var ctx = $("#nav-chart");

    var data = {
        labels: [
              @foreach($fund->navs->sortBy('modified_date') as $nav)
                  "{{$nav->modified_date}}",
              @endforeach
            ],
        datasets: [
            {
                label: "Price",
                fill: false,
                lineTension: 0.1,
                backgroundColor: "rgba(75,192,192,0.4)",
                borderColor: "rgba(75,192,192,1)",
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: "rgba(75,192,192,1)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(75,192,192,1)",
                pointHoverBorderColor: "rgba(220,220,220,1)",
                pointHoverBorderWidth: 2,
                pointRadius: 1,
                pointHitRadius: 10,
                data: [
                    @foreach($fund->navs->sortBy('modified_date') as $nav) 
                         "{{$nav->standard}}",
                    @endforeach
                ], 
                spanGaps: false,
            }
        ]
    };

    var myLineChart = Chart.Line(ctx, {
        data: data
    });
</script>

<script>
    $('#fund-info-tabs a').click(function (e) {
      e.preventDefault()
      $(this).tab('show')
    })
</script>
@endsection