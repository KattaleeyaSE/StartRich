app.controller('simulatorController', ['$scope','$sce','EstimateProfitResource',
function($scope,$sce,EstimateProfitResource) {
 
     $scope.normaltype=[
        {
            name:'Equity fund',
            value:'1',

        },{
            name:'General fixed income fund',
            value:'2',

        },{
            name:'Long-term fixed income fund',
            value:'3',

        },{
            name:'Short-term fixed income fund',
            value:'4',

        },{
            name:'Balanced fund',
            value:'5',

        },{
            name:'Flexible portfolio fund',
            value:'6',

        },{
            name:'Fund of funds',
            value:'7',

        },{
            name:'Warrant fund',
            value:'8',

        },{
            name:'Sector fund',
            value:'9',

        },{
            name:'Money market fund',
            value:'10',

        }
        ];

      $scope.fundtype=[
          {
              name:'EQSM',
              value:'1',

          },{
              name:'EQLARGE',
              value:'2',

          },{
              name:'EQGEN',
              value:'3',

          },{
              name:'EQUS',
              value:'4',

          },{
              name:'EQJP',
              value:'5',
              detail:''
          },{
              name:'EQEU',
              value:'6',
              detail:''
          },{
              name:'EQCH',
              value:'7',
              detail:''
          },{
              name:'EQGL',
              value:'8',
              detail:''
          },{
              name:'EQGEM',
              value:'9',
              detail:''
          },{
              name:'EQASxJP',
              value:'10',
              detail:''
          },{
              name:'EQIN',
              value:'11',
              detail:''
          },{
              name:'EQASEAN',
              value:'12',
              detail:''
          },{
              name:'EQHEALTH',
              value:'13',
              detail:''
          },{
              name:'EQENERGY',
              value:'14',
              detail:''
          },{
              name:'EQSET50',
              value:'15',
              detail:''
          },{
              name:'FIXGOV',
              value:'16',
              detail:''
          },{
              name:'FIXGEN',
              value:'17',
              detail:''
          },{
              name:'FIXMIDGEN',
              value:'18',
              detail:''
          },{
              name:'FIXLONGGEN',
              value:'19',
              detail:''
          },{
              name:'FIXMMGOV',
              value:'20',
              detail:''
          },{
              name:'FIXMMGEN',
              value:'21',
              detail:''
          },{
              name:'FIXEMH',
              value:'22',
              detail:''
          },{
              name:'FIXEMDISC',
              value:'23',
              detail:''
          },{
              name:'FIXGLH',
              value:'24',
              detail:''
          },{
              name:'FIXGLDISC',
              value:'25',
              detail:''
          },{
              name:'MIXAGG',
              value:'26',
              detail:''
          },{
              name:'MIXMOD',
              value:'27',
              detail:''
          },{
              name:'MIXCONS',
              value:'28',
              detail:''
          },{
              name:'MIX2FI',
              value:'29',
              detail:''
          },{
              name:'PRFREE',
              value:'30',
              detail:''
          },{
              name:'PRMIX',
              value:'31',
              detail:''
          },{
              name:'PRFOPTH',
              value:'32',
              detail:''
          },{
              name:'PRFOPMIX',
              value:'33',
              detail:''
          },{
              name:'PRFOPGL',
              value:'34',
              detail:''
          },{
              name:'COMINDEX',
              value:'35',
              detail:''
          },{
              name:'COMENG',
              value:'36',
              detail:''
          },{
              name:'COMPM',
              value:'37',
              detail:''
          },{
              name:'COMAGR',
              value:'38',
              detail:''
          },{
              name:'MISC',
              value:'39',
              detail:''
          },
      ];
    $scope.buyDate = null;
    $scope.sellDate = null;
    $scope.balance_of_investment =0;
    $scope.offAtBuyDate = null;
    $scope.selected = {};
    $scope.funds = [];
    $scope.groupCompany = [];
    $scope.dateRange = {};

    $scope.init = function ()
    {
        EstimateProfitResource.AllFunds().then(function(resp){
            $scope.funds = resp.data; 
        });
    }; 

    $scope.bindHtml = function (item)
    {
        return $sce.trustAsHtml(item); 
    }
 
    $scope.getNormalFund = function (id)
    { 
        return $scope.normaltype[id-1]; 
    };

    $scope.onSelectedCompany = function ()
    { 
       $scope.selected.mutualFundType = {};
       $scope.selected.mutualFund = {};
       $scope.buyDate = null;
       $scope.sellDate = null;
    };

    $scope.onSelectedMutualFundType = function ()
    { 
        $scope.selected.mutualFund = {};
        $scope.buyDate = null;
        $scope.sellDate = null;
    };

    $scope.onSelectedFund = function ()
    {
        $scope.dateRange.buy_start = $scope.selected.mutualFund.fund_start;
        $scope.dateRange.buy_end = $scope.selected.mutualFund.fund_end; 
        $scope.dateRange.sell_start = $scope.selected.mutualFund.fund_start;
        $scope.dateRange.sell_end = $scope.selected.mutualFund.fund_end; 
    };

    $scope.onBuyDatePickerChange = function (newValue, oldValue)
    { 
        $scope.dateRange.sell_start = newValue;
    };

    $scope.create = function ()
    { 
        $('#createSimulatorForm').submit(); 
    }; 

}]);