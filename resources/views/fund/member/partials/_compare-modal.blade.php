<div class="modal fade" id="compare-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Compare</h4>
      </div>
      <div class="modal-body">  

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#compare-detail" data-toggle="tab">Show by Info</a></li>
    <li role="presentation"><a href="#compare-performance" data-toggle="tab">Show by Past Performance</a></li>
    <li role="presentation"><a href="#compare-fee" data-toggle="tab">Show by subscription and redemption detail</a></li>
    <li role="presentation"><a href="#compare-portfolio" data-toggle="tab">Show by Portfolio</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="compare-detail">
      <table class="table">
        <thead>
            <th style="text-align: center;">Fund</th>
            <th style="text-align: center;">Type</th>
            <th style="text-align: center;">StartRich Rate</th>
            <th style="text-align: center;">Dividend Policy</th>
            <th style="text-align: center;">NAV</th>
            <th style="text-align: center;">Last percentage of return per 1 year</th>
        </thead>
        <tbody id="compare-detail-body">
        </tbody>
      </table>
    </div>
    <div role="tabpanel" class="tab-pane" id="compare-performance">
      <table class="table">
        <thead>
            <th style="text-align: center;">Fund</th>
            <th style="text-align: center;">1 Month</th>
            <th style="text-align: center;">3 Months</th>
            <th style="text-align: center;">1 Year</th>
            <th style="text-align: center;">3 Years</th>
            <th style="text-align: center;">5 Years</th>
            <th style="text-align: center;">10 Years</th>
            <th style="text-align: center;">Since Inception</th>
        </thead>
        <tbody id="compare-performance-body">
        </tbody>
      </table>
    </div>
    <div role="tabpanel" class="tab-pane" id="compare-fee">
      <table class="table">
        <thead>
            <th style="text-align: center;">Fund</th>
            <th style="text-align: center;">Actual Front End Fee</th>
            <th style="text-align: center;">Actual Back End Fee</th>
            <th style="text-align: center;">Actual Manager Fee</th>
            <th style="text-align: center;">Total Expense Ratio</th>
            <th style="text-align: center;">Minimum Value First Purchase</th>
            <th style="text-align: center;">Minimum Additional</th>
        </thead>
        <tbody id="compare-fee-body">
        </tbody>
      </table>
    </div>
    <div role="tabpanel" class="tab-pane" id="compare-portfolio">
      <table class="table">
        <thead>
            <th class="text-center" style="vertical-align: middle;">Fund</th>
            <th class="text-center" style="vertical-align: middle;">AIMC Type</th>
            <th class="text-center" style="vertical-align: middle;">% of Stock</th>
            <th class="text-center" style="vertical-align: middle;">% of Bond</th>
            <th class="text-center" style="vertical-align: middle;">% of Cash</th>
            <th class="text-center" style="vertical-align: middle;">% of Other</th>
        </thead>
        <tbody id="compare-portfolio-body">
        </tbody>
      </table>
    </div>
  </div>


      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>