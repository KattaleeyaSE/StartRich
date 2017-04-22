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
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="compare-detail">
      <table class="table">
        <thead>
            <th>Fund code</th>
            <th>Fund name</th>
            <th>Fund normal type</th>
            <th>StartRich Rate</th>
            <th>Dividend Policy</th>
            <th>NAV</th>
            <th>Last percentage of return per 1 year</th>
        </thead>
        <tbody id="compare-detail-body">
        </tbody>
      </table>
    </div>
    <div role="tabpanel" class="tab-pane" id="compare-performance">
      <table class="table">
        <thead>
            <th>Fund code</th>
            <th>Fund name</th>
            <th>1 Month</th>
            <th>3 Months</th>
            <th>1 Year</th>
            <th>3 Years</th>
            <th>5 Years</th>
            <th>10 Years</th>
            <th>Since Inception</th>
        </thead>
        <tbody id="compare-performance-body">
        </tbody>
      </table>
    </div>
    <div role="tabpanel" class="tab-pane" id="compare-fee">
      <table class="table">
        <thead>
            <th>Fund code</th>
            <th>Fund name</th>
            <th>Actual Front End Fee</th>
            <th>Actual Back End Fee</th>
            <th>Actual Manager Fee</th>
            <th>Total Expense Ratio</th>
            <th>Minimum Value First Purchase</th>
            <th>Minimum Additional</th>
        </thead>
        <tbody id="compare-fee-body">
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