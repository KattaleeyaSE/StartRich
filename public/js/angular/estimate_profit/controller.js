app.controller('estimateProfitController', ['$scope','$sce','EstimateProfitResource',
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
    $scope.buyDate = {};
    $scope.balance_of_investment =0;
    $scope.offAtBuyDate = null;
    $scope.errorMsg = null;
    $scope.selected = {};
    $scope.funds = [];
    $scope.groupCompany = [];

    $scope.init = function ()
    {
        EstimateProfitResource.AllFunds().then(function(resp){
            $scope.funds = resp.data;
            
        });
    };

    $scope.initUpdate = function (fundId,effective_date,balance)
    { 
        EstimateProfitResource.AllFunds().then(function(resp){
            $scope.funds = resp.data;
            $scope.balance_of_investment = balance;
            $scope.buyDate = moment(effective_date); 
            var mutualFund = $scope.funds.filter(function(fund){
                                            return fund.id == fundId;
                                            
                                        }); 
             $scope.selected.mutualFund = mutualFund[0];
             if(
                $scope.selected.mutualFund 
                && $scope.selected.mutualFund.nav 
                && $scope.selected.mutualFund.nav.length > 0 
            )
            {                     
                var nav =  $scope.selected.mutualFund.nav.filter(function(nav){
                                return nav.update_date == effective_date;
                                
                            });  
                
                if(nav && nav.length > 0)
                {
                    $scope.offAtBuyDate = nav[0]; 
                }          
            }          
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
       $scope.offAtBuyDate = null;
    };

    $scope.onSelectedMutualFundType = function ()
    { 
        $scope.selected.mutualFund = {};
        $scope.buyDate = null;
        $scope.offAtBuyDate = null;
    };

    $scope.onBuyDateChange = function (newValue, oldValue)
    { 
        $scope.offAtBuyDate = null;
        if(
            $scope.selected.mutualFund 
            && $scope.selected.mutualFund.nav 
            && $scope.selected.mutualFund.nav.length > 0 
            )
            {
                var nav =  $scope.selected.mutualFund.nav.filter(function(nav){
                                return nav.update_date == newValue.format("YYYY-MM-DD");
                                
                            }); 
                if(nav && nav.length > 0)
                {
                    $scope.offAtBuyDate = nav[0]; 
                }
            }   
    };

    $scope.create = function (member_id)
    {  
        if( $scope.offAtBuyDate)
        {
            $scope.createEstmateProfit ={
                'effective_date' : $scope.offAtBuyDate.update_date,
                'balance_of_investment' : $scope.balance_of_investment,
                'invest_id' :  $scope.offAtBuyDate.fund_id,
                'nav_id' :   $scope.offAtBuyDate.id,
                'member_id' : member_id,
            };

            EstimateProfitResource.Create($scope.createEstmateProfit).then(function(resp){
                    if(resp.status == 200 && resp.data.msg == "Success")
                    {
                        location.href = "/estimateprofit/index";
                    }
                    else
                    {
                        $scope.errorMsg = resp.data.msg;
                    }
                },
                function(resp) { 
                    // Handle error here
                    $scope.errorMsg = resp.data.msg;
                });
        } 
    };

    $scope.update = function (id)
    {   
        if( $scope.offAtBuyDate)
        {
            $scope.updateEstmateProfit ={
                'effective_date' : $scope.offAtBuyDate.update_date,
                'balance_of_investment' : $scope.balance_of_investment,
                'id' :  id,
            };

            EstimateProfitResource.Update($scope.updateEstmateProfit).then(function(resp){
                    if(resp.status == 200 && resp.data.msg == "Success")
                    {
                        location.href = "/estimateprofit/index";
                    }
                    else
                    {
                        $scope.errorMsg = resp.data.msg;
                    }
                },
                function(resp) { 
                    // Handle error here
                    $scope.errorMsg = resp.data.msg;
                });
        } 
    };

}]);